<?php

namespace TomatoPHP\TomatoForms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use TomatoPHP\TomatoAdmin\Facade\Tomato;
use TomatoPHP\TomatoForms\Models\FormOption;
use TomatoPHP\TomatoTranslations\Services\HandelTranslationInput;

class FieldOptionsController extends Controller
{
    use HandelTranslationInput;

    public function update(Request $request, FormOption $model){
        $this->translate($request);
        $request->validate([
            "has_options" => [function($attribute, $value, $fail) use ($request){
                if($value == 1 && $request->get('is_from_table') == 1){
                    $fail(__('Sorry Please Select Has Options or From Table'));
                }
            }]
        ]);
        $request->merge([
           "validation" => $request->get('rules')
        ]);
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                "name" => "required"
            ]
        );

        return $response->redirect;
    }

    public function destroy(Request $request, FormOption $model)
    {
        $formID = $model->form_id;
        $model->delete();
        Toast::success(__('Filed Removed Success'))->autoDismiss(2);
        return redirect()->route('admin.forms.build', $formID);
    }
}
