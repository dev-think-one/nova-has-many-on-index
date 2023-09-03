<?php

namespace NovaHasManyIndex\Tests\Fixtures\Nova\Resources;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;
use NovaHasManyIndex\NovaHasManyOnIndex;

/**
 * @extends Resource<\NovaHasManyIndex\Tests\Fixtures\Models\Author>
 */
class Author extends Resource
{

    public static $model = \NovaHasManyIndex\Tests\Fixtures\Models\Author::class;

    public static $title = 'title';

    public function fields(NovaRequest $request): array
    {
        return [
            Text::make('Name', 'name'),
            NovaHasManyOnIndex::make('Posts', 'posts_count')
                ->displayUsing(function ($val, $model) {
                    return [
                        'val'          => $val,
                        'resourceName' => Post::uriKey(),
                        'items'        => $model->posts->map(function ($item) {
                            return [
                                'id'             => $item->getKey(),
                                'title'          => $item->title,
                                'iconComponents' => [
                                    'name'       => 'boolean-icon',
                                    'attributes' => [
                                        'value'  => $item->is_published,
                                        'width'  => 20,
                                        'height' => 20,
                                    ],
                                ],
                            ];
                        })->all(),
                    ];
                })
                ->sortable(),
        ];
    }

}
