# Laravel Nova 'Has Many' on index

A Laravel Nova field used to display a 'Has Many' relationship on the index screen. \
*Very focused package for display quantity and list. May slow down the display of the index page*

## Installation

```bash
composer require yaroslawww/nova-has-many-on-index
```

![](./assets/images/has-many-on-index.gif)

## Usage

```injectablephp
NovaHasManyOnIndex::make(trans('cols-computed.subscriptions'), 'subscriptions_count')
        ->displayUsing(function ($val, $model) {
            return [
                'val'          => $val,
                'resourceName' => 'user-subscriptions',
                'items'        => $model->subscriptions->map(function ($item) {
                    return [
                        'id'             => $item->id,
                        'title'          => $item->title,
                        'iconComponents' => [
                            'name'       => 'boolean-icon',
                            'attributes' => [
                                'value'  => $item->is_active_subscription,
                                'width'  => 20,
                                'height' => 20,
                            ],
                        ],
                    ];
                })->all(),
            ];
        })
        ->sortable(),
```

## Credits

- [![Think Studio](https://yaroslawww.github.io/images/sponsors/packages/logo-think-studio.png)](https://think.studio/)
