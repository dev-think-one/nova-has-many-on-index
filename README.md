# Laravel Nova 'Has Many' on index

A Laravel Nova field used to display a 'Has Many' relationship on the index screen. \
*Very focused package for display quantity and list. May slow down the display of the index page*

## Installation

```bash
composer require think.studio/nova-has-many-on-index
```

![](./assets/images/has-many-on-index.gif)

## Usage

```injectablephp
NovaHasManyOnIndex::make(trans('cols-computed.subscriptions'), 'subscriptions_count')
        ->displayUsing(function ($val, $model) {
            return [
                'val'          => $val,
                'items'        => $model->subscriptions->map(function ($item) {
                    return [
                        'url'    => route('nova.pages.detail', [
                            'resource' => Contact::uriKey(),
                            'resourceId' => $item->getKey(),
                        ]),
                        'title' => "({$item->getKey()}) $item->name",
                        'icon' => [
                            'type' => 'trash',
                            'solid' => true,
                            'class' => 'text-red-500',
                        ],
                    ];
                })->all(),
            ];
        })
        ->sortable(),
```

## Credits

- [![Think Studio](https://yaroslawww.github.io/images/sponsors/packages/logo-think-studio.png)](https://think.studio/)
