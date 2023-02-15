<?php

namespace TomatoPHP\TomatoForms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoForms\Http\Requests\Field\FieldStoreRequest;
use TomatoPHP\TomatoForms\Http\Requests\Field\FieldUpdateRequest;
use TomatoPHP\TomatoForms\Http\Requests\Field\GroupStoreRequest;
use TomatoPHP\TomatoForms\Http\Requests\Field\GroupUpdateRequest;
use TomatoPHP\TomatoForms\Models\Field;
use TomatoPHP\TomatoForms\Models\FieldOption;
use TomatoPHP\TomatoForms\Tables\FieldTable;
use TomatoPHP\TomatoPHP\Services\Tomato;

class FieldController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return Tomato::index(
            request: $request,
            view: 'tomato-forms::fields.index',
            table: FieldTable::class,
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
            model: \TomatoPHP\TomatoForms\Models\Field::class,
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function options(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \TomatoPHP\TomatoForms\Models\FieldOption::class,
        );
    }


    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-forms::fields.create',
        );
    }

    /**
     * @param FieldStoreRequest $request
     * @return RedirectResponse
     */
    public function store(FieldStoreRequest $request): RedirectResponse
    {

        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoForms\Models\Field::class,
            hasMedia: $request->hasFile('photo') ? true : false,
            collection: 'photo',
            message: trans('tomato-forms::global.field.messages.created'),
            redirect: 'admin.fields.index',
        );

        if ($request->has('options') && count($request->get('options'))) {
            foreach ($request->get('options') as $option) {
                $newOption = new FieldOption();
                $newOption->field_id = $response['record']->id;
                $newOption->label = [
                    "ar" => $option['label_ar'],
                    "en" => $option['label_en'],
                ];
                $newOption->key = $option['key'];
                $newOption->type = $option['type'];
                $newOption->save();
            }
        }

        return $response['redirect'];
    }

    /**
     * @param Field $model
     * @return View
     */
    public function show(Field $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-forms::fields.show',
        );
    }

    /**
     * @param Field $model
     * @return View
     */
    public function edit(Field $model): View
    {

        foreach ($model->options as $item) {
            $item->label_ar = $item->getTranslation('label', 'ar') ?? " لا يوجد ";
            $item->label_en = $item->getTranslation('label', 'en')?? " not found";
        }
        $options = FieldOption::where('field_id', $model->id)->get();


        return Tomato::get(
            model: $model,
            data: ['options' =>  $options ? $options->toArray() : null],
            hasMedia: true,
            collection: 'photo',
            view: 'tomato-forms::fields.edit',
        );

    }

    /**
     * @param FieldUpdateRequest $request
     * @param Field $model
     * @return RedirectResponse
     */
    public function update(FieldUpdateRequest $request, Field $model): RedirectResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            hasMedia: $request->hasFile('photo') ? true : false,
            collection: 'photo',
            message: trans('tomato-forms::global.field.messages.updated'),
            redirect: 'admin.fields.index',
        );

        $values = [];
        if ($request->has('options') && count($request->get('options'))) {
            foreach ($request->get('options') as $option) {
                if (isset($option['id']) && $option['id'] != null) {
                    $optionItem = FieldOption::find($option['id']);
                    $optionItem->setTranslation('label', 'ar', $option['label_ar'])
                        ->setTranslation('label', 'en', $option['label_en']);
                    $optionItem->field_id = $model->id;
                    $optionItem->parent_id = $option['parent_id'];;
                    $optionItem->key = $option['key'];
                    $optionItem->type = $option['type'];
                    $optionItem->update();
                    array_push($values, $optionItem->id);

                } else {
                    $newOption = new FieldOption();
                    $newOption->field_id = $model->id;
                    $newOption->parent_id = $option['parent_id'];
                    $newOption->setTranslation('label', 'ar', $option['label_ar'])
                        ->setTranslation('label', 'en', $option['label_en']);
                    $newOption->key = $option['key'];
                    $newOption->type = $option['type'];
                    $newOption->save();
                    array_push($values, $newOption->id);
                }

            }
        } else {
            FieldOption::where('field_id', $model->id)->delete();
        }

        if(isset($values) && !empty($values)) {
            FieldOption::whereNotIn('id', $values)->delete();
        }

        return $response['redirect'];
    }

    /**
     * @param Field $model
     * @return RedirectResponse
     */
    public function destroy(Field $model): RedirectResponse
    {
        return Tomato::destroy(
            model: $model,
            message: trans('tomato-forms::global.field.messages.deleted'),
            redirect: 'admin.fields.index',
        );
    }
}
