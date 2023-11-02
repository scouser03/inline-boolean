<?php

namespace Scouser03\Inlineboolean\Http\Controllers;

use Laravel\Nova\Http\Requests\NovaRequest;



class InlineBooleanController
{
    public function action(NovaRequest $request)
    {
        $resourceClass = $request->resource();
        $resourceValidationRules = $resourceClass::rulesForUpdate($request);
        $fieldValidationRules = $resourceValidationRules[$request->attribute]  ?? [];

        if (!empty($fieldValidationRules)) {
            $validatedData = $request->validate(
                [
                    'value' => $fieldValidationRules,
                ]
            );
        }
        $model = $request->model()->find($request->id);
        $model->{$request->attribute} = $request->value;
        $model->save();

    }
}
