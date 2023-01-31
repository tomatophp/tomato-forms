<x-tomato-admin-layout>
    <x-slot name="header">
        <div class="flex flex-col justify-start">
            <div>
                {{$model->title}}
            </div>
            <p class="text-sm text-gray-400 font-normal">
                {{$model->description}}
            </p>
        </div>
    </x-slot>
    <x-slot name="headerBody">
        <Link href="/admin/forms" class="filament-button inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action">
          {{trans('tomato-forms::global.form.back')}}
        </Link>
    </x-slot>

    <div>
        <x-tomato-form :form="$model"></x-tomato-form>
    </div>
</x-tomato-admin-layout>
