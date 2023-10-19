<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'photo, nature, party, travel',
            'main_pic'=> $this->faker->storeTestImages(
                base_path('tests/Fixtures/main'),
                'images/main_pic'
            ),
            'preview_pic'=> $this->faker->storeTestImages(
                base_path('tests/Fixtures/preview'),
                'images/preview_pic'
            ),
            'user_id' => User::query()->where('role', 1)->inRandomOrder()->value('id'),
            'content' => $this->faker->paragraph( 50),
            'likes' => 0,
        ];
    }
}
