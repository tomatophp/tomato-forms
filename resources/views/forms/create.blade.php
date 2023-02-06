<x-tomato-admin-layout>
    <x-slot name="header">
        {{trans('tomato-admin::global.crud.create')}} {{trans('tomato-forms::global.form.single')}}
    </x-slot>
    <x-slot name="headerBody">
        <Link href="/admin/forms" class="filament-button inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action">
            {{trans('tomato-forms::global.form.back')}}
        </Link>
    </x-slot>

    <x-splade-form :default="[
        'method' => 'POST',
        'type' => 'page',
        'fields' => [],
        'is_active' => 0,
    ]" class="flex flex-col space-y-4" action="{{route('admin.forms.store')}}" method="post">

        <div class="grid grid-cols-2 gap-4">
            <x-splade-input class="col-span-2" label="{{trans('tomato-forms::global.form.form_title')}} [{{trans('tomato-forms::global.lang.ar')}}]" name="title.ar" type="text"  placeholder="{{trans('tomato-forms::global.form.form_title')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
            <x-splade-input class="col-span-2" label="{{trans('tomato-forms::global.form.form_title')}} [{{trans('tomato-forms::global.lang.en')}}]" name="title.en" type="text"  placeholder="{{trans('tomato-forms::global.form.form_title')}} [{{trans('tomato-forms::global.lang.en')}}]" />
            <x-splade-textarea class="col-span-2" label="{{trans('tomato-forms::global.form.description')}} [{{trans('tomato-forms::global.lang.ar')}}]" name="description.ar" placeholder="{{trans('tomato-forms::global.form.description')}} [{{trans('tomato-forms::global.lang.ar')}}]" autosize />
            <x-splade-textarea class="col-span-2" label="{{trans('tomato-forms::global.form.description')}} [{{trans('tomato-forms::global.lang.en')}}]" name="description.en" placeholder="{{trans('tomato-forms::global.form.description')}} [{{trans('tomato-forms::global.lang.en')}}]" autosize />

            <x-splade-input label="{{trans('tomato-forms::global.form.name')}} [{{trans('tomato-forms::global.lang.ar')}}]" name="name.ar" type="text"  placeholder="{{trans('tomato-forms::global.form.name')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
            <x-splade-input label="{{trans('tomato-forms::global.form.name')}} [{{trans('tomato-forms::global.lang.en')}}]" name="name.en" type="text"  placeholder="{{trans('tomato-forms::global.form.name')}} [{{trans('tomato-forms::global.lang.en')}}]" />

            <div class="flex justify-start">
                <x-splade-input class="w-full" label="{{trans('tomato-forms::global.form.key')}}" name="key" type="text"  placeholder="{{trans('tomato-forms::global.form.key')}}" />
                <div class="flex flex-col justify-end  ltr:ml-4 rtl:mr-4">
                    <button @click.prevent="form.key = form.name.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');" class="p-2 h-11 rounded-lg bg-primary-500 text-white text-center">
                        <div class="flex flex-col justify-center">
                            <i class="bx bx-refresh"></i>
                        </div>
                    </button>
                </div>
            </div>

            <x-splade-select name="type" label="{{trans('tomato-forms::global.form.type')}}"  placeholder="{{trans('tomato-forms::global.form.type')}}">
                <option value="page">{{trans('tomato-forms::global.form.types.page')}}</option>
                <option value="modal">{{trans('tomato-forms::global.form.types.modal')}}</option>
                <option value="slideover">{{trans('tomato-forms::global.form.types.slideover')}}</option>
            </x-splade-select>

            <x-splade-select name="method" label="{{trans('tomato-forms::global.form.method')}}"  placeholder="{{trans('tomato-forms::global.form.method')}}">
                <option value="POST">POST</option>
                <option value="GET">GET</option>
                <option value="PUT">PUT</option>
                <option value="DELETE">DELETE</option>
                <option value="PATCH">PATCH</option>
            </x-splade-select>
            <x-splade-input  name="endpoint" label="{{trans('tomato-forms::global.form.endpoint')}}"  type="text"  placeholder="{{trans('tomato-forms::global.form.endpoint')}}" />


            <x-splade-checkbox class="col-span-2" name="is_active" label="{{trans('tomato-forms::global.form.is_active')}}" />
        </div>

        <x-tomato-repeater label="{{trans('tomato-forms::global.form.fields')}}" :options="['field','is_primary','group']" name="fields" id="fields" >
            <x-splade-select remote-url="{{route('admin.fields.api')}}" remote-root="model.data" v-model="repeater.main[key].field" option-label="label.{{app()->getLocale()}}" label="{{trans('tomato-forms::global.form.field')}}" option-value="id" />
            <x-splade-select remote-url="{{route('admin.groups.api')}}" remote-root="model.data" v-model="repeater.main[key].group" option-label="name.{{app()->getLocale()}}" label="{{trans('tomato-forms::global.groups.single')}}" option-value="id" />
            <x-splade-checkbox class="col-span-2"  v-model="repeater.main[key].is_primary" name="is_primary" label="{{trans('tomato-forms::global.form.is_primary')}}" />
        </x-tomato-repeater>
        <x-splade-submit label="{{trans('tomato-admin::global.crud.create-new')}} {{trans('tomato-forms::global.form.back')}}" :spinner="true" />
        <br>
        <br>
    </x-splade-form>
</x-tomato-admin-layout>
