<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
//    protected $userService;
//
//    public function _construct(UserService $userService){
//        $this->$userService=$userService;
//    }

    public function getAll()
    {
        return UserService::getAll();
//        $this->userService->index();

    }

    public function show($id)
    {
//      return $this->userService->show($id);
      return (new UserService)->show($id);
    }

    public function store(Request $request)
    {
//      return $this->userService->store($request);
       return (new UserService)->store($request);
    }

    public function  deleteUser( $id){

        return (new UserService)->deleteUser($id);
    }
}
