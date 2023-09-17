<?php

namespace TomatoPHP\TomatoForms\Views;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Form extends Component
{
    public Collection $fields;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public \TomatoPHP\TomatoForms\Models\Form $form,
        public string                           $method = "POST",
        public string                           $action = "/",
    )
    {
        $this->method = $this->method ? $this->method : $form->method;
        $this->action = $this->action ? $this->action : $form->endpoint;
        $this->fields = $form->fields()->orderBy('order', 'asc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('tomato-forms::components.form', [
            'form' => $this->form,
            'fields' => $this->fields,
            'method' => $this->method,
            'action' => $this->action,
        ]);
    }
}
