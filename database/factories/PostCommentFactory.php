<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\PostImage;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'user_id'=>User::factory(),
          'post_image_id'=>PostImage::factory(),
          'comment'=> fake()->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
