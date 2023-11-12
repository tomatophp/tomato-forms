<?php

namespace TomatoPHP\TomatoForms\Services;

use TomatoPHP\TomatoForms\Services\Contracts\Form;

class RegisterForms
{
    public array $forms = [];

    public function register(Form $form){
        $this->forms[] = $form;
    }

    public function getForms(): array
    {
        return $this->forms;
    }

    public function build(): void
    {
        foreach ($this->forms as $form){
            $checkIfFormExists = \TomatoPHP\TomatoForms\Models\Form::where('key', $form->key)->first();
            if(!$checkIfFormExists){
                $newForm = \TomatoPHP\TomatoForms\Models\Form::create($form->toArray());
                $newForm->fields()->createMany($form->inputs);
            }
        }
    }
}
