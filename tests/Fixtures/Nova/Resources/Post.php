<?php

namespace NovaHasManyIndex\Tests\Fixtures\Nova\Resources;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

/**
 * @extends Resource<\NovaHasManyIndex\Tests\Fixtures\Models\Post>
 */
class Post extends Resource
{

    public static $model = \NovaHasManyIndex\Tests\Fixtures\Models\Post::class;

    public static $title = 'title';

    public function fields(NovaRequest $request): array
    {
        return [
            Text::make('Title', 'title'),
            Textarea::make('Content', 'content'),
        ];
    }

}
