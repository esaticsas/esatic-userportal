<?php

namespace Esatic\ActiveUser\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserModuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'modules' => ['required'],
            'modules.*.modules_id' => ['required', 'numeric'],
            'modules.*.view' => ['required', 'boolean'],
            'modules.*.create' => ['required', 'boolean'],
            'modules.*.update' => ['required', 'boolean']
        ];
    }
}
