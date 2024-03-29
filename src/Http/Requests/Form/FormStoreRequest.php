<?php

namespace TomatoPHP\TomatoForms\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class FormStoreRequest extends FormRequest
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
            'name' => 'required|array|min:1',
            'name.*' => 'required|max:255|string',
            'key' => 'required|max:255|string|unique:forms',
            'endpoint' => 'nullable|max:255|string',
            'method' => 'nullable|max:255|string',
            'title' => 'nullable|min:1|array',
            'title.*' => 'nullable|max:255|string',
            'description' => 'nullable|array',
            'description.*' => 'nullable|max:65535',
            'is_active' => 'nullable',
            'fields' => 'nullable|array',
        ];
    }
}
