<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use stdClass;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'commentbody',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public static function findByID($id){
        $comment= DB::table('comments')->where('id', $id)->first();
        return $comment;
    }
    public static function FindCommentsForAPost($postID){
        if(DB::table('comments')->where('post_id', $postID)->exists()){
            $comments=DB::table('comments')->where('post_id', $postID)->get();
            return ($comments);
        }else{
            return new stdClass();
        }

    }

    public static function CreateCommentsForAPost(array $request,$postID){
        if (DB::table('posts')->where('id', $postID)->exists()) {
            $comment= new Comment;
            $comment->commentbody=$request['commentbody'];
            $comment->post_id=$postID;
            $comment->save();
            return true;
        }else {
            return false;
        }
    }

    public static function UpdateCommentOfAPost(array $request,$postId,$id)
    {
        if (DB::table('posts')->where('id', $postId)->exists()) {
            $comment= Comment::findByID($id);
            $commentbody=is_null($request['commentbody'])?$comment->commentbody:$request['commentbody'];
            DB::table('comments')->where('id', $id)->update(['commentbody' => $commentbody]);
            return true;
        }else{
            return false;
        }

    }

    public static function deleteCommentOfPost($comment_id,$post_id)
    {
        if (DB::table('posts')->where('id', $post_id)->exists() && DB::table('comments')->where('id', $comment_id)->exists()) {
            DB::delete('delete from comments where id = ?',[$comment_id]);
            return true;
        }else{
            return false;
        }
    }



}
