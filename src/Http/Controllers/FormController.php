<?php

namespace TomatoPHP\TomatoForms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\Toast;
use TomatoPHP\TomatoForms\Http\Requests\Form\FormStoreRequest;
use TomatoPHP\TomatoForms\Http\Requests\Form\FormUpdateRequest;
use TomatoPHP\TomatoForms\Models\Form;
use TomatoPHP\TomatoForms\Models\FormOption;
use TomatoPHP\TomatoForms\Tables\FormTable;
use TomatoPHP\TomatoAdmin\Facade\Tomato;
use TomatoPHP\TomatoTranslations\Services\HandelTranslationInput;

class FormController extends Controller
{
    use HandelTranslationInput;

    /**
     * Form Index.
     *
     * You Can Get All Forms.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: Form::class,
            view: 'tomato-forms::forms.index',
            table: FormTable::class,
            query: Form::with('fields'),
            resource: config('tomato-forms.index_resource') ?: null
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \TomatoPHP\TomatoForms\Models\Form::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-forms::forms.create'
        );
    }

    /**
     * @param FormStoreRequest $request
     * @return RedirectResponse
     */
    public function store(FormStoreRequest $request): RedirectResponse
    {
        $response = Tomato::store(
            request: $request,
            model: Form::class
        );

        return $response->redirect;
    }

    /**
     *  Form Show.
     *
     *  Select From By ID and show fileds of it.
     *
     * @param Form $model
     * @return View
     */
    public function show(Form $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-forms::forms.show',
            resource: config('tomato-forms.show_resource') ?: null
        );
    }

    /**
     * @param Form $model
     * @return View
     */
    public function edit(Form $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-forms::forms.edit'
        );
    }

    /**
     * @param FormUpdateRequest $request
     * @param Form $model
     * @return RedirectResponse
     */
    public function update(FormUpdateRequest $request, Form $model): RedirectResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
        );

        return $response->redirect;
    }

    /**
     * @param Form $model
     * @return RedirectResponse
     */
    public function destroy(Form $model): RedirectResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: trans('tomato-forms::global.form.messages.deleted'),
            redirect: 'admin.forms.index',
        );

        return $response->redirect;
    }

    public function build(Request $request, Form $model){
        $options = FormOption::where('form_id', $model->id)->orderBy('order', 'asc')->get();
        foreach ($options as $option){
            $option->label_tomato_translations_ar = $option->getTranslation('label', 'ar');
            $option->label_tomato_translations_en = $option->getTranslation('label', 'en');
            $option->placeholder_tomato_translations_ar = $option->getTranslation('placeholder', 'ar');
            $option->placeholder_tomato_translations_en = $option->getTranslation('placeholder', 'en');
            $option->hint_tomato_translations_ar = $option->getTranslation('hint', 'ar');
            $option->hint_tomato_translations_en = $option->getTranslation('hint', 'en');
            $option->required_message_tomato_translations_ar = $option->getTranslation('required_message', 'ar');
            $option->required_message_tomato_translations_en = $option->getTranslation('required_message', 'en');
            $option->options = $option->options ? $option->options : [];
            $option->rules = $option->validation ? $option->validation : [
                "type" => "string",
                "min" => 1,
                "max" => 255
            ];
        }
        return view('tomato-forms::forms.builder', compact('model', 'options'));
    }

    public function order(Request $request){
        $request->validate([
            'orderBy' => "required|string"
        ]);

        $getAll = $request->get('all');
        foreach ($getAll as $key => $value){
            $option = FormOption::find($value['id']);
            $option->order = $key;
            $option->save();
        }

        Toast::success(__('Order Updated Success'))->autoDismiss(2);
        return back();
    }


    public function options(Request $request, Form $model){
        $request->validate([
            "type" => "required"
        ]);

        $lastOption = FormOption::where('form_id', $model->id)->get();

        foreach ($lastOption as $key=>$item){
            $getOptions = FormOption::find($item->id);
            $getOptions->order += 1;
            $getOptions->save();
        }

        $option = new FormOption();
        $option->form_id = $model->id;
        $option->type = $request->get('type');
        $option->name = $request->get('type');
        $option->save();

        return back();
    }

    public function formOptions(Request $request){
        $request->validate([
            'form_id' => "required|int|exists:forms,id",
        ]);

        $options = FormOption::where('form_id', $request->form_id)->get();

        return response()->json([
            "data" => $options
        ]);
    }

    public function clear(Form $model){

        FormOption::where('form_id', $model->id)->delete();

        Toast::success(__('Form Cleared Success'))->autoDismiss(2);
        return back();
    }
}
