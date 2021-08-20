<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getAllCommentsForAPost($id){
        return CommentService::showAllCommentsForAPost($id);
    }

    public function createCommentForPost(Request $request,$id){
        return CommentService::CreateCommentForAPost($request,$id);
    }


    public function updateCommentOfAPost(Request $request,$postID,$id){
        return CommentService::UpdateCommentForAPost($request,$postID,$id);
    }

    public function deleteCommentOfPost($comment_id,$post_id){
        return CommentService::deleteCommentOfPost($comment_id,$post_id);
    }
}
