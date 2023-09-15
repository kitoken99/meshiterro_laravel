<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function create($post_image_id){
      $favorite = new Favorite();
      $favorite->post_image_id = $post_image_id;
      $favorite->user_id = Auth::user()->id;
      $favorite->save();
      return redirect('post_image/'.$post_image_id);
    }
    public function destroy($post_image_id){
      Favorite::where('post_image_id', $post_image_id)->where('user_id', Auth::user()->id)->delete();
      return redirect('post_image/'.$post_image_id);
    }
}
