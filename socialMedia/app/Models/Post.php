<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use stdClass;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'title',
        'user_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function getAll()
    {
        return DB::table('posts')->get();//get all posts
    }


    public static function findPostsByUserID($userID)
    {
        $user = User::findByID($userID);
        if(DB::table('posts')->where('user_id', $userID)->exists())
        {
            $posts=DB::table('posts')->where('user_id', $userID)->get();
            return ($posts);
        }else
        {
            return new stdClass();
        }

    }

    public static function getRecentPosts($limit){
//        $dummy=$limit;
//        $limit=$dummy*$skip;
//        ->skip($skip*$limit)

        return DB::table('posts')->orderBy('created_at', 'desc')->take($limit)->get();
    }


    public static function findByID($id){
        $post= DB::table('posts')->where('id', $id)->first();
        return $post;
    }

    public static function findByTitle($title){
        print_r(gettype($title));
        print_r($title);
        $posts= DB::table('posts')->where('title', $title)->get();
        return $posts;
    }

    public static function createPostForUser(array $request,$userID)
    {
        if (DB::table('users')->where('id', $userID)->exists()) {

//            $user = User::findByID($userID);
            $post= new Post;
            $post->title=$request['title'];
            $post->description=$request['description'];
            $post->user_id=$userID;
            $post->save();
            return true;
        }else {
            return false;
        }

    }

    public static function UpdatePostOfAUser(array $request,$userId,$id)
    {
        if (DB::table('users')->where('id', $userId)->exists()) {
            $post= Post::findByID($id);
            $title=is_null($request['title'])?$post->title:$request['title'];
            $description=is_null($request['description'])?$post->description:$request['description'];
            DB::table('posts')->where('id', $id)->update(['title' => $title,'description'=>$description]);
            return true;
        }else{
            return false;
        }

    }

    public static function deletePostOfUser($post_id,$user_id)
    {
        if (DB::table('users')->where('id', $user_id)->exists() && DB::table('posts')->where('id', $post_id)->exists()) {
            DB::delete('delete from posts where id = ?',[$post_id]);
            return true;
        }else{
            return false;
        }
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }


}
