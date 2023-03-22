<?php

namespace Goodcatch\Modules\ModuleExample\Http\Requests\Admin;

use Goodcatch\Modules\ModuleExample\Http\Requests\BaseRequest as FormRequest;

class ExampleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules ()
    {
        return [
            'name' => ['required', 'max:200'],
        ];
    }
}
