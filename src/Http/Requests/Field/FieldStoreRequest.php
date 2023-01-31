<?php

namespace TomatoPHP\TomatoForms\Http\Requests\Field;

use Illuminate\Foundation\Http\FormRequest;

class FieldStoreRequest extends FormRequest
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
            'label.ar' => 'required|max:255|string',
            'name.en' => 'nullable|max:255|string',
            'placeholder.ar' => 'nullable|max:255|string',
            'placeholder.en' => 'nullable|max:255|string',
            'hint.ar' => 'nullable|max:255|string',
            'hint.en' => 'nullable|max:255|string',
            'key' => 'required|max:255|string|unique:fields,key',
            'default' => 'nullable|max:255|string',
            'has_options' => 'nullable|boolean',
            'is_required' => 'nullable|boolean',
            'required_message.ar' => 'nullable|max:255|string',
            'required_message.en' => 'nullable|max:255|string',
            'options' => 'nullable|array',
        ];
    }
}
