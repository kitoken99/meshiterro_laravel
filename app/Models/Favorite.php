<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'post_image_id',
    ];

    public function user(){
      return $this->belongsTo('App\Models\User');
    }

    public function post_image(){
      return $this->belongsTo('App\Models\PostImage');
    } 

    
}
