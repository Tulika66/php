<?php

namespace App\Services;

//use App\Models\Comment;
//use App\Models\Post;
//use Illuminate\Http\Request;
//

class ResponseStructure{

    public $message;
    public $code;

    function __construct( $message, $code ) {
        $this->message = $message;
        $this->code = $code;
    }


}
