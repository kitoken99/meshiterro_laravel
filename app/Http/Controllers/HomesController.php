<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class HomesController extends Controller
{
  public function top(){
    return view('homes.top');
  }
  public function about(){
    return view('homes.about');
  }
}
