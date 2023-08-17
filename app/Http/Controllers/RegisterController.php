<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function create(){
    return view("regist.register");
  }
  public function store(Request $request){
    $request->validate([
      "name" => "required|string|max:255",
      "email" => "required|string|email|max:255|unique:users",
      "password" => "required|string|confirmed|min:8|max:255",
    ]);
    $user = User::create([
      "name" => $request->name,
      "email" => $request->email,
      "password" => Hash::make($request->password)
    ]);
    return redirect("/");
  }
}