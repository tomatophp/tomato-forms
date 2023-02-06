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
use TomatoPHP\TomatoForms\Tables\FormTable;
use TomatoPHP\TomatoPHP\Services\Tomato;

class FormController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {

        return Tomato::index(
            request: $request,
            view: 'tomato-forms::forms.index',
            table: FormTable::class,
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

        $request->validated();
        $record = \TomatoPHP\TomatoForms\Models\Form::create($request->all());

        if($request->has('fields') && $request->get('fields')){
            $fieldsArray = [];
            foreach ($request->get('fields') as $key=>$field){
                if(!array_key_exists($field['field'], $fieldsArray)){
                    $fieldsArray[$field['field']] = ['order' => $key,'is_primary' => $field['is_primary'],'group_id'=> $field['group']];
                }
            }
            $record->fields()->attach($fieldsArray);
        }


        Toast::title(trans('tomato-forms::global.form.messages.created'))->success()->autoDismiss(2);
        return redirect()->route('admin.forms.index');

    }

    /**
     * @param Form $model
     * @return View
     */
    public function show(Form $model): View
    {
        $model->fields = $model->fields;
        return Tomato::get(
            model: $model,
            view: 'tomato-forms::forms.show'
        );
    }

    /**
     * @param Form $model
     * @return View
     */
    public function edit(Form $model): View
    {
        $model->fields = $model->fields()->get()->map(static function($item){
            return ["field" => $item->id,'is_primary'=>($item->pivot->is_primary == 1) ?true :false,'group'=> $item->pivot->group_id];
        });

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
        $request->validated();
        $model->update($request->all());

        if($request->has('fields') && $request->get('fields')) {
            $fieldsArray = [];
            foreach ($request->get('fields') as $key => $field) {
                if (!array_key_exists($field['field'], $fieldsArray)) {
                    $fieldsArray[$field['field']] = ['order' => $key,'is_primary' => $field['is_primary'],'group_id'=> $field['group']];
                }
            }
            $model->fields()->sync($fieldsArray);
        }

        Toast::title(trans('tomato-forms::global.form.messages.updated'))->success()->autoDismiss(2);
        return redirect()->route('admin.forms.index');
    }

    /**
     * @param Form $model
     * @return RedirectResponse
     */
    public function destroy(Form $model): RedirectResponse
    {
        return Tomato::destroy(
            model: $model,
            message: trans('tomato-forms::global.form.messages.deleted'),
            redirect: 'admin.forms.index',
        );
    }
}
