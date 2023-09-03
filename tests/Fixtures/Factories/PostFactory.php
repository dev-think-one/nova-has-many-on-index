<?php

namespace NovaHasManyIndex\Tests\Fixtures\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use NovaHasManyIndex\Tests\Fixtures\Models\Post;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title'    => fake()->unique()->word(),
            'content'  => fake()->sentence(100),
        ];
    }
}
