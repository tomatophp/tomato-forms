<?php

namespace TomatoPHP\TomatoForms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class FormRequestController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoForms\Models\FormRequest::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'tomato-forms::form-requests.index',
            table: \TomatoPHP\TomatoForms\Tables\FormRequestTable::class,
            resource: config('tomato-forms.requests_index_resource', null) ?: null
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
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $request->merge([
           "model_type" => "App\Models\User",
           "model_id" => auth()->user()->id,
           "payload" => $request->all(),
        ]);

        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoForms\Models\FormRequest::class,
            validation: [
                'form_id' => 'required|exists:forms,id'
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
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoForms\Models\FormRequest $model): View|JsonResponse
    {
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
