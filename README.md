# Laravel Nova 'Has Many' on index

![Packagist License](https://img.shields.io/packagist/l/think.studio/nova-has-many-on-index?color=%234dc71f)
[![Packagist Version](https://img.shields.io/packagist/v/think.studio/nova-has-many-on-index)](https://packagist.org/packages/think.studio/nova-has-many-on-index)
[![Total Downloads](https://img.shields.io/packagist/dt/think.studio/nova-has-many-on-index)](https://packagist.org/packages/think.studio/nova-has-many-on-index)
[![Build Status](https://scrutinizer-ci.com/g/dev-think-one/nova-has-many-on-index/badges/build.png?b=main)](https://scrutinizer-ci.com/g/dev-think-one/nova-has-many-on-index/build-status/main)
[![Code Coverage](https://scrutinizer-ci.com/g/dev-think-one/nova-has-many-on-index/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/dev-think-one/nova-has-many-on-index/?branch=main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dev-think-one/nova-has-many-on-index/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/dev-think-one/nova-has-many-on-index/?branch=main)


A Laravel Nova field used to display a 'Has Many' relationship on the index screen. \
*Very focused package for display quantity and list. May slow down the display of the index page*

## Installation

```shell
composer require think.studio/nova-has-many-on-index
```

![](./assets/images/has-many-on-index.gif)

## Usage

```php
\NovaHasManyIndex\NovaHasManyOnIndex::make(trans('cols-computed.subscriptions'), 'subscriptions_count')
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
