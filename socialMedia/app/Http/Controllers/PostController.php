<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAll()
    {
        return PostService::getAll();
    }

   public function getAllPostsForUser($id){
        return PostService::showAllPostsForUser($id);
   }

   public function createPostForUser(Request $request,$id){
        return PostService::CreatePostForUser($request,$id);
   }

    public function updatePostOfAUser(Request $request,$userID,$id){
        return PostService::updatePostOfAUser($request,$userID,$id);
    }

    public function deletePostOfUser($post_id, $user_id)
    {
      return PostService::deletePostOfUser($post_id, $user_id);
    }

    public function getRecentPosts($limit){
        return PostService::getRecentPosts($limit);
    }
    public function getPostByTitle($title){

        return PostService::getPostsByTitle($title);
    }
}
