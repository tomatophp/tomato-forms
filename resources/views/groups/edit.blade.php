<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.edit')}} {{trans('tomato-forms::global.groups.single')}} #{{$model->id}}</h1>

    <x-splade-form class="flex flex-col space-y-4" unguarded action="{{route('admin.groups.update', $model->id)}}" method="post" :default="$model">

        <x-splade-input name="name.ar" type="text"  placeholder="{{trans('tomato-forms::global.groups.name')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
        <x-splade-input name="name.en" type="text"  placeholder="{{trans('tomato-forms::global.groups.name')}} [{{trans('tomato-forms::global.lang.en')}}]" />
        <x-splade-input name="key" type="text"  placeholder="{{trans('tomato-forms::global.groups.key')}}" />


        <x-splade-submit label="{{trans('tomato-admin::global.crud.update')}} {{trans('tomato-forms::global.groups.single')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
