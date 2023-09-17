<?php

namespace TomatoPHP\TomatoForms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;
use TomatoPHP\TomatoForms\Models\FormRequest;

class FormRequestController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoForms\Models\FormRequest::class;
    }

    /**
     *  Form Requests Index.
     *
     *  You Can View All Requests Come to Selected Form.
     *
     * @tags Form Requests
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $request->validate([
            "user_id" => "nullable",
            "form_id" => "nullable|exists:forms,id",
        ]);

        $request->merge([
            "model_id" => $request->get('user_id')
        ]);

        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'tomato-forms::form-requests.index',
            table: \TomatoPHP\TomatoForms\Tables\FormRequestTable::class,
            resource: config('tomato-forms.requests_index_resource', null) ?: null,
            filters: ['form_id', 'model_id']
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
            model: \TomatoPHP\TomatoForms\Models\FormRequest::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-forms::form-requests.create',
        );
    }

    /**
     *  Form Requests Store.
     *
     *  You can use this endpoint to store the form requests.
     *
     * @tags Form Requests
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $rules = [];
        $userModel = get_class(auth()->user()->getModel());
        $request->merge([
           "model_type" => $userModel,
           "model_id" => auth()->user()->id,
           "payload" => $request->has('payload') ? $request->get('payload') : $request->all(),
        ]);




        $getFromFields = \TomatoPHP\TomatoForms\Models\Form::find($request->get('form_id'))?->fields;
        if($getFromFields){
            foreach ($getFromFields as $field){

                $validations = [];

                if($field->is_required){
                    $validations[] = "required";
                }

                if($field->has_validation){
                    if($field->validations){
                        foreach ($field->validations as $key=>$validation){
                            if($key === 'max'){
                                $validations[] = "max:{$validation}";
                            }
                            if($key === 'min'){
                                $validations[] = "min:{$validation}";
                            }
                            if($key === 'type'){
                                $validations[] = "{$validation}";
                            }
                        }
                    }
                }

                $rules["payload.{$field->name}"] = $validations;
            }
        }

        $request->validate([
            "form_id" => "required|exists:forms,id",
            "payload" => "nullable|array"
        ]);

        $request->validate($rules);


        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoForms\Models\FormRequest::class,
            message: __('FormRequest updated successfully'),
            redirect: 'admin.form-requests.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     *  Form Requests Show.
     *
     *  You Can Show A Selected Request.
     *
     * @tags Form Requests
     *
     * @param \TomatoPHP\TomatoForms\Models\FormRequest $model
     * @return View|JsonResponse
     */
    public function show($model): View|JsonResponse
    {
        $model = FormRequest::find($model);
        return Tomato::get(
            model: $model,
            view: 'tomato-forms::form-requests.show',
            resource: config('tomato-forms.requests_show_resource') ?: null
        );
    }

    /**
     * @param \TomatoPHP\TomatoForms\Models\FormRequest $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoForms\Models\FormRequest $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-forms::form-requests.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoForms\Models\FormRequest $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoForms\Models\FormRequest $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'form_id' => 'sometimes|exists:forms,id',
                'model_type' => 'nullable|max:255|string',
                'model_id' => 'nullable',
                'status' => 'nullable|max:255|string',
                'payload' => 'nullable'
            ],
            message: __('FormRequest updated successfully'),
            redirect: 'admin.form-requests.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoForms\Models\FormRequest $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoForms\Models\FormRequest $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('FormRequest deleted successfully'),
            redirect: 'admin.form-requests.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
