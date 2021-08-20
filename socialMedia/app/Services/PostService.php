<?php

namespace App\Services;

use App\Models\Post;
use App\Validations\Validation;
use Illuminate\Http\Request;
use stdClass;

class PostService {

//    protected $userRepository;
//
//    public function _construct(User $userRepository){
//        $this->$userRepository=$userRepository;
//    }


    public static function showAllPostsForUser($id){
        //todo preloading
        try{
            $posts=Post::findPostsByUserID($id);
            if ($posts ==new stdClass() ){
//            return response()->json([
//                "message" => "User Does not exist. Posts could not be extracted."
//            ], 404);
                return response()->json(new ResponseStructure("User Saved successfully",400));
            }
            return response()->json($posts,200);
        }catch(\Exception $e)
        {
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }

    }

    public static function CreatePostForUser(Request $request,$userID)
    {
        $validations=Validation::postValidate($request);
        if($validations){
            return response()->json(new ResponseStructure($validations,200));
        }
        try{
            $requestArr = array();
            $requestArr['title'] = $request->title;
            $requestArr['description'] = $request->description;
            $check = Post::createPostForUser($requestArr, $userID);
            if ($check) {
    //            return response()->json([
    //                "message" => "Post Created successfully"
    //            ], 200);
                return response()->json(new ResponseStructure("Post Created successfully", 200));
            } else {
    //            return response()->json([
    //                "message" => "Post Could not be created. User Does not exist."
    //            ], 200);
                return response()->json(new ResponseStructure("Post Could not be created. User Does not exist.", 400));
            }
       }catch(\Exception $e)
        {
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }
    }

    public static function getAll()
    {
        //todo preloading?
        try {
            $posts = Post::getAll();
            if ($posts->isNotEmpty()) {
                return $posts;
            } else {
                return response()->json(new ResponseStructure("No Posts exist. Try creating one, before fetching", 400));
            }
        }catch(\Exception $e)
        {
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }
    }

    public static function getPostsByTitle($title)
    {
        //todo preloading?
        try {
            $posts = Post::findByTitle($title);
            if ($posts->isNotEmpty()) {
                return $posts;
            } else {
                return response()->json(new ResponseStructure("No Posts exist with that title. Try creating one, before fetching", 400));
            }
        }catch(\Exception $e)
        {
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }
    }

    public static function getRecentPosts($limit)
    {
        //todo preloading?
        try {
            $posts = Post::getRecentPosts($limit);
            if ($posts->isNotEmpty()) {
                return $posts;
            } else {
                return response()->json(new ResponseStructure("No Posts exist. Try creating one, before fetching", 400));
            }
        }catch(\Exception $e)
        {
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }
    }

    public static function deletePostOfUser($post_id, $user_id)
    {
        try {
            $response = Post::deletePostOfUser($post_id, $user_id);
            if (!$response) {
//            return response()->json([
//                "message" => "Either User or User's Post Does not exist. Deletion failed."
//            ], 404);
                return response()->json(new ResponseStructure("Either User or User's Post Does not exist. Deletion failed.", 400));
            } else {
//            return response()->json([
//                "message" => "Post deleted successfully."
//            ], 200);
                return response()->json(new ResponseStructure("Post deleted successfully.", 200));
            }
        }catch(\Exception $e)
        {
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }
    }

    public STATIC function updatePostOfAUser(Request $request, $userID,$id)
    {
        $validations=Validation::postValidate($request);
        if($validations){
            return response()->json(new ResponseStructure($validations,200));
        }
        try {
            $requestArr = array();
            $requestArr['title'] = $request->title;
            $requestArr['description'] = $request->description;

//        $response= (new User)->UpdateUser($requestArr,$id);
            $response = Post::UpdatePostOfAUser($requestArr, $userID, $id);
            if ($response) {
//            return response()->json([
//                "message" => "User Does not exist. Update failed."
//            ], 404);
                return response()->json(new ResponseStructure("User Does not exist. Update failed.", 400));
            } else {
//            return response()->json([
//                "message" => "Post Updated successfully."
//            ], 200);
                return response()->json(new ResponseStructure(" Post Updated successfully.", 200));
            }
        }catch(\Exception $e)
        {
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }
    }

}


