<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostImage;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    public function create($post_image_id, Request $request){
      $post_image = PostImage::find($post_image_id);
      $comment = new PostComment();
      $comment->comment = $request->comment;
      $comment->post_image_id = $post_image->id;
      $comment->user_id = Auth::user()->id;
      $comment->save();
      return redirect('/post_image/'.$post_image->id);
    }
}
