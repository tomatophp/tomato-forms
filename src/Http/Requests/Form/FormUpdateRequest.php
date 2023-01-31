<?php

namespace TomatoPHP\TomatoForms\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type' => 'nullable|max:255|string',
            'name.ar' => 'sometimes|max:255|string',
            'name.en' => 'sometimes|max:255|string',
            'key' => 'sometimes|max:255|string',
            'endpoint' => 'nullable|max:255|string',
            'method' => 'nullable|max:255|string',
            'title.ar' => 'nullable|max:255|string',
            'title.en' => 'nullable|max:255|string',
            'description.ar' => 'nullable|max:65535',
            'description.en' => 'nullable|max:65535',
            'is_active' => 'nullable',
            'fields' => 'nullable|array',
        ];
    }
}
