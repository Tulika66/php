<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

//    $posts = User::find(1)->posts;

    public function commentOwner()
    {
        return $this->hasOneThrough(Comment::class, Post::class);
    }


    public static function findByID($id)
    {

            $user= DB::table('users')->where('id', $id)->first();
            return $user;
//        throw new Exception("Random Exception catching ability testing for service ");
    }

    public static function create(array $request)
    {
        $user= new User;
        $user->name=$request['name'];
        $user->phone=$request['phone'];
        $user->save();
        return true;

    }

    public function UpdateUser(array $request,$id)
    {
        if (User::findByID($id)->exists()) {
            $user= User::findByID($id);
            $user->name=is_null($request['name'])?$user->name:$request['name'];
            $user->phone=is_null($request['phone'])?$user->name:$request['phone'];
            $user->save();
            return true;
        }else{
            return false;
        }

    }


    public static function getAll()
    {
        return DB::table('users')->get();
    }

    public function deleteUser($id)
    {
        if (DB::table('users')->where('id', $id)->exists()) {
//            $userClient = User::find($id);
//            $userClient->delete();
            DB::delete('delete from users where id = ?',[$id]);
            return true;
        }else{
            return false;
        }
    }

}
