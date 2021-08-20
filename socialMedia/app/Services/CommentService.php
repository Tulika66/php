<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Validations\Validation;
use Illuminate\Http\Request;
use stdClass;

class CommentService {

    public static function showAllCommentsForAPost($post_id){

       try{
           $comments=Comment::FindCommentsForAPost($post_id);
           if ($comments == new stdClass()){
//            return response()->json([
//                "message" => "Either Post Does not exist or No comments inside post.Comments could not be extracted."
//            ], 404);
               return response()->json(new ResponseStructure("Either Post Does not exist or No comments inside post.Comments could not be extracted.",400));
           }
           return response()->json($comments,200);
       }catch(\Exception $e){
           return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
       }

    }

    public static function CreateCommentForAPost(Request $request,$post_id){
        //todo validations
        $validations=Validation::commentValidate($request);
        if($validations){
            return response()->json(new ResponseStructure($validations,200));
        }
        try{
            $requestArr=array();
            $requestArr['commentbody']=$request->commentbody;
            $check= Comment::CreateCommentsForAPost($requestArr,$post_id);
            if ($check){
//            return response()->json([
//                "message" => "Comment added successfully"
//            ], 200);
                return response()->json(new ResponseStructure("Comment added successfully",200));
            }else{
//            return response()->json([
//                "message" => "Comment Could not be created. Post Does not exist."
//            ], 200);
                return response()->json(new ResponseStructure("Comment Could not be created. Post Does not exist.",400));
            }
        }catch(\Exception $e){
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }
    }

    public static function UpdateCommentForAPost(Request $request,$post_id,$id)
    {
        $validations=Validation::commentValidate($request);
        if($validations){
            return response()->json(new ResponseStructure($validations,200));
        }
        try{
            $requestArr = array();
            $requestArr['commentbody'] = $request->commentbody;
            $response = Comment::UpdateCommentOfAPost($requestArr, $post_id, $id);
            if (!$response) {
    //            return response()->json([
    //                "message" => "Post Does not exist. Update for comment failed."
    //            ], 404);
                return response()->json(new ResponseStructure("Post Does not exist. Update for comment failed.", 400));
            } else {
    //            return response()->json([
    //                "message" => "Post's Comment Updated successfully."
    //            ], 200);
                return response()->json(new ResponseStructure("Post's Comment Updated successfully.", 200));
            }
       }catch(\Exception $e){
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }
    }

    public static function deleteCommentOfPost($comment_id,$post_id)
    {
        try{
            $response = Comment::deleteCommentOfPost($comment_id, $post_id);
            if (!$response) {
                //            return response()->json([
                //                "message" => "Either Post or the Comment Does not exist. Deletion failed."
                //            ], 404);

                return response()->json(new ResponseStructure("Either Post or the Comment Does not exist. Deletion failed.", 400));
            } else {
                //            return response()->json([
                //                "message" => "Comment deleted successfully."
                //            ], 200);
                return response()->json(new ResponseStructure("Comment deleted successfully.", 200));
            }
        }catch(\Exception $e){
            return response()->json(new ResponseStructure($e->getMessage(),$e->getCode()));
        }
    }
}
