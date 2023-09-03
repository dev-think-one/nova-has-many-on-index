<?php

namespace NovaHasManyIndex\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchestra\Testbench\Factories\UserFactory;

class User extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
