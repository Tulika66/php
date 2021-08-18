<?php

namespace App\Models;

//use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
USE \Exception;

class UserClient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname'];
    /**
     * @var mixed
     */
    private $id;
    /**
     * @var mixed
     */
    /**
     * @var mixed
     */


    public static function find($id)
    {
//            try{
//                $user = DB::table('user_clients')->where('id', $id)->first();
//            }catch(Exception $e){
//                error_log("exception found in creating:= $e");
//
//            }finally{
//                return new UserClient;
//            }
//}
            $user= DB::table('user_clients')->where('id', $id)->first();
           // error_log("user found = $user");
            return $user;


    }

    public static function create(array $request)
    {
        $userClient= new UserClient;
        $userClient->name=$request['name'];
        $userClient->surname=$request['surname'];
        $userClient->save();
        return true;

    }


    public static function getAll()
    {
        return DB::table('user_clients')->get();
    }

    public function deleteUser($id)
    {
        if (DB::table('user_clients')->where('id', $id)->exists()) {
            $userClient = UserClient::find($id);
//            $userClient->delete();
            DB::delete('delete from user_clients where id = ?',[$id]);
            return true;
        }else{
           return false;
        }
    }
}
