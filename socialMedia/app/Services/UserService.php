<?php

namespace App\Services;

use App\Models\User;
use App\Validations\Validation;
use Exception;
use http\Env\Response;

use Illuminate\Http\Request;


class UserService {

//    protected $userRepository;
//
//    public function _construct(User $userRepository){
//        $this->$userRepository=$userRepository;
//    }


    public static function show($id){

//       $user= (new UserService)->userRepository->findByID($id);
        try{
            $user=User::findByID($id);
            if (empty($user)){
//            return response()->json([
//                "message" => "User Does not exist"
//            ], 404);
                return response()->json(new ResponseStructure("User Does not exist",400));
            }
            return response()->json($user,200);

        }catch(Exception $e){
//            return back()->withError($e->getMessage())->withInput();
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }



    }

    public static function store(Request $request)
    {

        $validations=Validation::userValidate($request);
        if($validations){
            return response()->json(new ResponseStructure($validations,200));
        }
        $requestArr=array();
        $requestArr['name']=$request->name;
        $requestArr['phone']=$request->phone;
        try{
            $check= User::create($requestArr);
//        $check=$this->userRepository->create($requestArr);
            if ($check){
//            return response()->json([
//                "message" => "User Saved successfully"
//            ], 200);
                return response()->json(new ResponseStructure("User Saved successfully",200));
            }else{
//            return response()->json([
//                "message" => "User Could not be Saved successfully. Some problem occurred."
//            ], 200);
                return response()->json(new ResponseStructure("User Could not be Saved successfully. Some problem occurred.",500));
            }
        }catch(Exception $e){
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }

    }

    public static function getAll()
    {
//        return User::getAll();
        try{
            $users= User::getAll();
            if($users->isNotEmpty()){
                return $users;
            }
            else {
                return response()->json(new ResponseStructure("No Users exist. Try creating one, before fetching",400));
            }
        }catch(Exception $e){
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }

    }

    public function deleteUser( $id)
    {
        try{
            $response= (new User)->deleteUser($id);
            if (!$response){
//            return response()->json([
//                "message" => "User Does not exist. Deletion failed."
//            ], 404);
                return response()->json(new ResponseStructure("User Does not exist. Deletion failed.",400));
            }
            else{
//            return response()->json([
//                "message" => "User deleted successfully."
//            ], 200);
                return response()->json(new ResponseStructure("User deleted successfully.",200));
            }
        }catch(Exception $e)
        {
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }

    }

    public function updateUser(Request $request, $id)
    {
        //todo validation
        $validations=Validation::userValidate($request);
        if($validations){
            return response()->json(new ResponseStructure($validations,200));
        }
        try{
            $requestArr=array();
            $requestArr['name']=$request->name;
            $requestArr['phone']=$request->phone;
            $response= (new User)->UpdateUser($requestArr,$id);
            if (!$response){
//            return response()->json([
//                "message" => "User Does not exist. Update failed."
//            ], 404);
                return response()->json(new ResponseStructure("User Does not exist. Update failed.",400));
            }
            else{
//            return response()->json([
//                "message" => "User Updated successfully."
//            ], 200);
                return response()->json(new ResponseStructure("User Updated successfully.",200));
            }
        }catch(Exception $e)
        {
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }


    }

}


