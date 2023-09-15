<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'user_id' => User::factory(),
          'shop_name'=> fake()->company(),
          'caption'=> fake()->realText($maxNbChars = 200, $indexSize = 2),
          'image'=> "",
        ];
    }
}
