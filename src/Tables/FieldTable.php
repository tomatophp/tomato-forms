<?php

namespace TomatoPHP\TomatoForms\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class FieldTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return \TomatoPHP\TomatoForms\Models\Field::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(label: trans('tomato-admin::global.search'),columns: ['id','key',])
            ->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: fn (\TomatoPHP\TomatoForms\Models\Field $model) => $model->delete(),
                after: fn () => Toast::danger(trans('tomato-forms::field.messages.deleted'))->autoDismiss(2),
                confirm: true
            )
            ->export()
            ->defaultSort('id')
            ->column(key: 'id',label: trans('tomato-forms::global.field.id'), sortable: true)
            ->column(key: 'type',label: trans('tomato-forms::global.field.type'), sortable: true)
            ->column(key: 'label',label: trans('tomato-forms::global.field.label'), sortable: true)
            ->column(key: 'key',label: trans('tomato-forms::global.field.key'), sortable: true)
            ->column(key: 'default',label: trans('tomato-forms::global.field.default'), sortable: true)
            ->column(key: 'is_required',label: trans('tomato-forms::global.field.is_required'), sortable: true)
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->paginate(15);
    }
}
