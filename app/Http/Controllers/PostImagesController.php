<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostImagesController extends Controller
{
    public function index(){
      $post_images = PostImage::all();
      return view('post_images.index', ['post_images' => $post_images]);
    }

    public function new(){
      return view('post_images.new');
    }

    public function show(){
      return view('post_images.show');
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

    protected function post_image(array $data){
      return Validator::make($data, [
        'shop_name' => ['required', 'string', 'max:255'],
        'caption' => ['required', 'string'],
        'image' => ['image'],
      ]);
    }
}
