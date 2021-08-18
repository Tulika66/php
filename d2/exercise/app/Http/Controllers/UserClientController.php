<?php

namespace App\Http\Controllers;

use App\Models\UserClient;
use Illuminate\Http\Request;

class UserClientController extends Controller
{
    public function index()
    {
        return UserClient::getAll();
    }

    public function show($id)
    {
       $user= UserClient::find($id);
       if (empty($user)){
           return response()->json([
               "message" => "User Does not exist"
           ], 404);
       }

       return response()->json($user,200);
    }

    public function store(Request $request)
    {
        $requestArr=array();
        $requestArr['name']=$request->name;
        $requestArr['surname']=$request->surname;
        $check= UserClient::create($requestArr);

        if ($check){
             return response()->json([
                 "message" => "User Saved successfully"
             ], 200);
        }else{
            return response()->json([
                "message" => "User Could not be Saved successfully. Some problem occurred."
            ], 200);
        }
    }


    public function deleteUser(Request $request, $id)
    {

       $response= (new \App\Models\UserClient)->deleteUser($id);
        if (!$response){
            return response()->json([
                "message" => "User Does not exist. Deletion failed."
            ], 404);
        }
        else{
            return response()->json([
                "message" => "User deleted successfully."
            ], 404);
        }
    }
}
