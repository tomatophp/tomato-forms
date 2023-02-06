<?php

namespace TomatoPHP\TomatoForms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoForms\Http\Requests\Group\GroupStoreRequest;
use TomatoPHP\TomatoForms\Http\Requests\Group\GroupUpdateRequest;
use TomatoPHP\TomatoForms\Models\Field;
use TomatoPHP\TomatoForms\Models\FieldOption;
use TomatoPHP\TomatoForms\Models\Group;
use TomatoPHP\TomatoForms\Tables\FieldTable;
use TomatoPHP\TomatoForms\Tables\GroupTable;
use TomatoPHP\TomatoPHP\Services\Tomato;

class GroupController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return Tomato::index(
            request: $request,
            view: 'tomato-forms::groups.index',
            table: GroupTable::class,
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
            model: \TomatoPHP\TomatoForms\Models\Group::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-forms::groups.create',
        );
    }

    /**
     * @param GroupStoreRequest $request
     * @return RedirectResponse
     */
    public function store(GroupStoreRequest $request): RedirectResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoForms\Models\Group::class,
            message: trans('tomato-forms::global.field.messages.created'),
            redirect: 'admin.groups.index',
        );
        return $response['redirect'];
    }

    /**
     * @param Group $model
     * @return View
     */
    public function show(Group $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-forms::groups.show',
        );
    }

    /**
     * @param Group $model
     * @return View
     */
    public function edit(Group $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-forms::groups.edit',
        );

    }

    /**
     * @param GroupUpdateRequest $request
     * @param Group $model
     * @return RedirectResponse
     */
    public function update(GroupUpdateRequest $request, Group $model): RedirectResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            message: trans('tomato-forms::global.field.messages.updated'),
            redirect: 'admin.groups.index',
        );
        return $response['redirect'];

    }

    /**
     * @param Group $model
     * @return RedirectResponse
     */
    public function destroy(Group $model): RedirectResponse
    {
        return Tomato::destroy(
            model: $model,
            message: trans('tomato-forms::global.field.messages.deleted'),
            redirect: 'admin.groups.index',
        );
    }
}
