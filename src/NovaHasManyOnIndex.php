<?php

namespace NovaHasManyIndex;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class NovaHasManyOnIndex extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-has-many-index';

    /**
     * @inheritdoc
     */
    public $showOnIndex = true;


    /**
     * @inheritdoc
     */
    public function isShownOnDetail(NovaRequest $request, $resource): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function isShownOnUpdate(NovaRequest $request, $resource): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function isShownOnCreation(NovaRequest $request): bool
    {
        return false;
    }
}
