<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PostImage;
class UsersController extends Controller
{
    public function show($id){
      $user = User::find($id);
      $post_images = PostImage::whereuser_id($id)->get();
      return view('users.show', ['user' => $user, 'post_images' => $post_images]);
    }

    public function edit($id){
      $user = User::find($id);
      return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, string $id){
      $image = User::find($id)->image;
      
      if($request->hasFile('image')){
        $image=$request->file('image')->getClientOriginalName();
        request()->file('image')->storeAs('public/images/', $image);
      }
      User::find($id)->update([
        'name' => $request['name'],
        'image' => $image
      ]);
      return redirect('/user/'.$id);

      return redirect('post_images');
    }
}
