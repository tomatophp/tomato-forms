<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{trans('tomato-forms::global.form.single')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" :unguarded="['form_title', 'description', 'name']" action="{{route('admin.forms.update', $model->id)}}" method="post" :default="$model">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <x-splade-input  label="{{trans('tomato-forms::global.form.form_title')}} [{{trans('tomato-forms::global.lang.ar')}}]" name="title.ar" type="text"  placeholder="{{trans('tomato-forms::global.form.form_title')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
            <x-splade-input  label="{{trans('tomato-forms::global.form.form_title')}} [{{trans('tomato-forms::global.lang.en')}}]" name="title.en" type="text"  placeholder="{{trans('tomato-forms::global.form.form_title')}} [{{trans('tomato-forms::global.lang.en')}}]" />

            <x-splade-textarea class="col-span-2" label="{{trans('tomato-forms::global.form.description')}} [{{trans('tomato-forms::global.lang.ar')}}]" name="description.ar" placeholder="{{trans('tomato-forms::global.form.description')}} [{{trans('tomato-forms::global.lang.ar')}}]" autosize />
            <x-splade-textarea class="col-span-2" label="{{trans('tomato-forms::global.form.description')}} [{{trans('tomato-forms::global.lang.en')}}]" name="description.en" placeholder="{{trans('tomato-forms::global.form.description')}} [{{trans('tomato-forms::global.lang.en')}}]" autosize />

            <x-splade-input label="{{trans('tomato-forms::global.form.name')}} [{{trans('tomato-forms::global.lang.ar')}}]" name="name.ar" type="text"  placeholder="{{trans('tomato-forms::global.form.name')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
            <x-splade-input label="{{trans('tomato-forms::global.form.name')}} [{{trans('tomato-forms::global.lang.en')}}]" @input="form.key = form.name.en.toLowerCase()" name="name.en" type="text"  placeholder="{{trans('tomato-forms::global.form.name')}} [{{trans('tomato-forms::global.lang.en')}}]" />

            <x-splade-input class="w-full" label="{{trans('tomato-forms::global.form.key')}}" name="key" type="text"  placeholder="{{trans('tomato-forms::global.form.key')}}" />


            <x-splade-select choices name="type" label="{{trans('tomato-forms::global.form.type')}}"  placeholder="{{trans('tomato-forms::global.form.type')}}">
                <option value="page">{{trans('tomato-forms::global.form.types.page')}}</option>
                <option value="modal">{{trans('tomato-forms::global.form.types.modal')}}</option>
                <option value="slideover">{{trans('tomato-forms::global.form.types.slideover')}}</option>
            </x-splade-select>

            <x-splade-select choices name="method" label="{{trans('tomato-forms::global.form.method')}}"  placeholder="{{trans('tomato-forms::global.form.method')}}">
                <option value="POST">POST</option>
                <option value="GET">GET</option>
                <option value="PUT">PUT</option>
                <option value="DELETE">DELETE</option>
                <option value="PATCH">PATCH</option>
            </x-splade-select>
            <x-splade-input  name="endpoint" label="{{trans('tomato-forms::global.form.endpoint')}}"  type="text"  placeholder="{{trans('tomato-forms::global.form.endpoint')}}" />


            <x-splade-checkbox class="col-span-2" name="is_active" label="{{trans('tomato-forms::global.form.is_active')}}" />

            <div class="flex justify-start gap-2 pt-3">
                <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
                <x-tomato-admin-button danger :href="route('admin.forms.destroy', $model->id)"
                                       confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                       confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                       confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                       cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                       method="delete"  label="{{__('Delete')}}" />
                <x-tomato-admin-button secondary :href="route('admin.forms.index')" label="{{__('Cancel')}}"/>
            </div>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
