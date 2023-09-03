<?php

namespace NovaHasManyIndex\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use NovaHasManyIndex\Tests\Fixtures\Factories\AuthorFactory;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $guarded = [];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id', 'id');
    }

    protected static function newFactory(): AuthorFactory
    {
        return AuthorFactory::new();
    }
}
