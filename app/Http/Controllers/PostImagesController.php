<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\PostComment;

class PostImagesController extends Controller
{
    public function index(Request $request){
      $keyword = $request->input('keyword');
      $query = PostImage::query();
      if(!empty($keyword)) {
        $query->where('shop_name', 'LIKE', "%{$keyword}%")
            ->orWhere('caption', 'LIKE', "%{$keyword}%");
      }
      $post_images = $query->get();
      return view('post_images.index', ['keyword' => $keyword, 'post_images' => $post_images]);
    }

    public function new(){
      return view('post_images.new');
    }

    public function show($id){
      $post_image = PostImage::find($id);
      $post_comment = PostComment::wherepost_image_id($id)->get();
      return view('post_images.show', ['post_image' => $post_image, 'post_comment' => $post_comment]);
    }

    public function store(Request $request){
      $image='';
      
      if($request->hasFile('image')){
        $image=$request->file('image')->getClientOriginalName();
        request()->file('image')->storeAs('public/images/', $image);
      }
      PostImage::create([
        'user_id' => Auth::id(),
        'shop_name' => $request['shop_name'],
        'caption' => $request['caption'],
        'image' => $image,
      ]);
      return redirect('post_images');
    }

    public function destroy($id){
      PostImage::find($id)->delete();
      return redirect('post_images');
    }


    protected function post_image(array $data){
      return Validator::make($data, [
        'shop_name' => ['required', 'string', 'max:255'],
        'caption' => ['required', 'string'],
        'image' => ['image'],
      ]);
    }
}
