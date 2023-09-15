<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Favorite;
use App\Models\User;
use App\Models\PostComment;
use App\Models\PostImage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        $postImage = PostImage::factory(20)->recycle($users)->create();
        PostComment::factory(30)->recycle($users)->recycle($postImage)->create();
        foreach ($users as $user){
          foreach ($postImage as $image){
            $r = rand(0, 1);
	          if ($r == 0) {
              Favorite::factory(1)->create([
                'user_id' => $user->id,
                'post_image_id' => $image->id,
            ]);
            }
          }
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
