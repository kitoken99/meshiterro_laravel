<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
