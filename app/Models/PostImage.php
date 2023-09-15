<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostImage extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'shop_name',
      'caption',
      'image',
    ];

    public function get_image(){
      if(!$this->image){
        return 'no_image.jpg';
      }else{
        return $this->image;
      }
    }
    public function user(){
      return $this->belongsTo('App\Models\User');
    }
    public function PostComments(){
      return $this->hasMany('App\Models\PostComment');
    }
    public function Favorites(){
      return $this->hasMany('App\Models\Favorite');
    }
    public function favorited_by(){
      return Favorite::where('post_image_id', $this->id )->where('user_id', Auth::user()->id)->exists();
    }
}
