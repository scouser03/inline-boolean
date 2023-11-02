<?php

namespace Scouser03\InlineBoolean;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Field;

class InlineBoolean extends Boolean
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'inline-boolean';
}
