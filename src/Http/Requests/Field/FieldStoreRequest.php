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
        $rulesOne =  [
            'type' => 'required|max:255|string',
            'label.ar' => 'required|max:255|string',
            'label.en' => 'required|max:255|string',
            'placeholder.ar' => 'nullable|max:255|string',
            'placeholder.en' => 'nullable|max:255|string',
            'hint.ar' => 'nullable|max:255|string',
            'unit.ar' => 'nullable|max:255|string',
            'unit.en' => 'nullable|max:255|string',
            'hint.en' => 'nullable|max:255|string',
            'key' => 'required|max:255|string|unique:fields,key',
            'default' => 'nullable|max:255|string',
            'has_options' => 'nullable|boolean',
            'is_required' => 'nullable|boolean',
            'required_message.ar' => 'nullable|max:255|string',
            'required_message.en' => 'nullable|max:255|string',
        ];

        $rulesTwo = [];
        if(request()->has('has_options') && request()->get('has_options') == '1'){
            $rulesTwo=  [
                'options' => 'required|array',
                'options.*.key' => 'required|max:255|string|unique:field_options,key',
                'options.*.label_ar' => 'required|max:255|string',
                'options.*.label_en' => 'required|max:255|string',
            ];
        }

        $rules = array_merge($rulesOne,$rulesTwo);
        return $rules;
    }
}
