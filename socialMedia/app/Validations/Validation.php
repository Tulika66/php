<?php
namespace App\Validations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Validation{

    public static function userValidate(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|unique:users|min:10|max:10',
            'name' => 'required|string|max:5100',
        ]);

        if ($validator->fails()) {
            return $validator->messages()->first();
        }

    }

    public static function postValidate(Request $request){
        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
            'title' => 'required|string|max:5100',
        ]);

        if ($validator->fails()) {
            return $validator->messages()->first();
        }
    }

    public static function commentValidate(Request $request){
        $validator = Validator::make($request->all(), [
            'commentbody' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $validator->messages()->first();
        }
    }



}

