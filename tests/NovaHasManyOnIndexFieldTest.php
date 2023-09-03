<?php

namespace NovaHasManyIndex\Tests;

use Laravel\Nova\Http\Requests\NovaRequest;
use NovaHasManyIndex\NovaHasManyOnIndex;
use NovaHasManyIndex\Tests\Fixtures\Models\Author;
use NovaHasManyIndex\Tests\Fixtures\Models\Post;
use NovaHasManyIndex\Tests\Fixtures\Models\User;

class NovaHasManyOnIndexFieldTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create();

        $this->actingAs($this->admin);
    }

    /** @test */
    public function get_index_fields()
    {
        $author1 = Author::factory()
            ->has(Post::factory()->count(2))
            ->create();
        $author2 = Author::factory()->create();
        $author3 = Author::factory()
            ->has(Post::factory()->count(3))
            ->create();

        $uriKey = \NovaHasManyIndex\Tests\Fixtures\Nova\Resources\Author::uriKey();

        $response = $this->get("nova-api/{$uriKey}/");

        $this->assertIsArray($response->json('resources'));
        $this->assertCount(3, $response->json('resources'));

        $this->assertIsArray($response->json('resources.0.fields.1.displayedAs.items'));
        $this->assertCount(3, $response->json('resources.0.fields.1.displayedAs.items'));

        foreach ($response->json('resources.0.fields.1.displayedAs.items') as $item) {
            $this->assertEquals($author3->posts()->find($item['id'])->title, $item['title']);
        }
    }

    /** @test */
    public function field_only_on_index()
    {
        $author = Author::factory()->create();

        $field = NovaHasManyOnIndex::make('test');

        $this->assertFalse($field->isShownOnDetail(app(NovaRequest::class), $author));
        $this->assertFalse($field->isShownOnUpdate(app(NovaRequest::class), $author));
        $this->assertFalse($field->isShownOnCreation(app(NovaRequest::class), $author));
    }
}
