<?php

namespace NovaHasManyIndex\Tests\Fixtures\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use NovaHasManyIndex\Tests\Fixtures\Models\Author;

/**
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory
{

    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'name'    => fake()->unique()->name(),
        ];
    }
}
