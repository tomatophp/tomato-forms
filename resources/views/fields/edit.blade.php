<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.edit')}} {{trans('tomato-forms::global.field.single')}} #{{$model->id}}</h1>

    <x-splade-form class="flex flex-col space-y-4" unguarded action="{{route('admin.fields.update', $model->id)}}" method="post" :default="$model">
        <x-splade-select name="type" placeholder="{{trans('tomato-forms::global.field.type')}}">
            <option value="text">{{trans('tomato-forms::global.field.types.text')}}</option>
            <option value="file">{{trans('tomato-forms::global.field.types.file')}}</option>
            <option value="number">{{trans('tomato-forms::global.field.types.number')}}</option>
            <option value="email">{{trans('tomato-forms::global.field.types.email')}}</option>
            <option value="tel">{{trans('tomato-forms::global.field.types.tel')}}</option>
            <option value="select">{{trans('tomato-forms::global.field.types.select')}}</option>
            <option value="checkbox">{{trans('tomato-forms::global.field.types.checkbox')}}</option>
            <option value="radio">{{trans('tomato-forms::global.field.types.radio')}}</option>
            <option value="rang">{{trans('tomato-forms::global.field.types.rang')}}</option>
            <option value="date">{{trans('tomato-forms::global.field.types.date')}}</option>
            <option value="datetime">{{trans('tomato-forms::global.field.types.datetime')}}</option>
            <option value="time">{{trans('tomato-forms::global.field.types.time')}}</option>
            <option value="password">{{trans('tomato-forms::global.field.types.password')}}</option>
            <option value="textarea">{{trans('tomato-forms::global.field.types.textarea')}}</option>
            <option value="rich">{{trans('tomato-forms::global.field.types.rich')}}</option>
        </x-splade-select>

        <x-splade-input name="label.ar" type="text"  placeholder="{{trans('tomato-forms::global.field.label')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
        <x-splade-input name="label.en" type="text"  placeholder="{{trans('tomato-forms::global.field.label')}} [{{trans('tomato-forms::global.lang.en')}}]" />

        <x-splade-input name="placeholder.ar" type="text"  placeholder="{{trans('tomato-forms::global.field.placeholder')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
        <x-splade-input name="placeholder.en" type="text"  placeholder="{{trans('tomato-forms::global.field.placeholder')}} [{{trans('tomato-forms::global.lang.en')}}]" />

        <x-splade-input name="hint.ar" type="text"  placeholder="{{trans('tomato-forms::global.field.hint')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
        <x-splade-input name="hint.en" type="text"  placeholder="{{trans('tomato-forms::global.field.hint')}} [{{trans('tomato-forms::global.lang.en')}}]" />

        <x-splade-input name="key" type="text"  placeholder="{{trans('tomato-forms::global.field.key')}}" />
        <x-splade-input name="default" type="text"  placeholder="{{trans('tomato-forms::global.field.default')}}" />

        <x-splade-input name="unit.ar" type="text"  placeholder="{{trans('tomato-forms::global.field.unit')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
        <x-splade-input name="unit.en" type="text"  placeholder="{{trans('tomato-forms::global.field.unit')}} [{{trans('tomato-forms::global.lang.en')}}]" />

        <x-splade-file name="photo"  filepond preview />

        <x-splade-checkbox name="has_options" label="{{trans('tomato-forms::global.field.has_options')}}" />

        <div v-if="form.has_options === true">
            <x-tomato-repeater :options="['label_ar', 'label_en', 'type', 'value','parent_id']" name="options" id="options" label="Option">
                <div class="flex flex-col space-y-4">
                    <x-splade-select v-model="repeater.main[key].type"  placeholder="Type">
                        <option value="text">{{trans('tomato-forms::global.field.types.text')}}</option>
                        <option value="file">{{trans('tomato-forms::global.field.types.file')}}</option>
                        <option value="number">{{trans('tomato-forms::global.field.types.number')}}</option>
                        <option value="email">{{trans('tomato-forms::global.field.types.email')}}</option>
                        <option value="tel">{{trans('tomato-forms::global.field.types.tel')}}</option>
                        <option value="select">{{trans('tomato-forms::global.field.types.select')}}</option>
                        <option value="checkbox">{{trans('tomato-forms::global.field.types.checkbox')}}</option>
                        <option value="radio">{{trans('tomato-forms::global.field.types.radio')}}</option>
                        <option value="rang">{{trans('tomato-forms::global.field.types.rang')}}</option>
                        <option value="date">{{trans('tomato-forms::global.field.types.date')}}</option>
                        <option value="datetime">{{trans('tomato-forms::global.field.types.datetime')}}</option>
                        <option value="time">{{trans('tomato-forms::global.field.types.time')}}</option>
                        <option value="password">{{trans('tomato-forms::global.field.types.password')}}</option>
                        <option value="textarea">{{trans('tomato-forms::global.field.types.textarea')}}</option>
                        <option value="rich">{{trans('tomato-forms::global.field.types.rich')}}</option>
                    </x-splade-select>
                    <x-splade-select name="parent_id" :options="$options"   v-model="repeater.main[key].parent_id" option-label="label.{{app()->getLocale()}}" label="{{trans('tomato-forms::global.form.field')}}" option-value="id" />
                    <x-splade-input v-model="repeater.main[key].label_ar" type="text"  placeholder="{{trans('tomato-forms::global.field.label')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
                    <x-splade-input v-model="repeater.main[key].label_en" type="text"  placeholder="{{trans('tomato-forms::global.field.label')}} [{{trans('tomato-forms::global.lang.en')}}]" />
                    <x-splade-input v-model="repeater.main[key].key"  type="text"  placeholder="{{trans('tomato-forms::global.field.key')}}" />
                </div>
            </x-tomato-repeater>
        </div>
        <x-splade-checkbox name="is_required" label="{{trans('tomato-forms::global.field.is_required')}}" />
        <x-splade-textarea v-if="form.is_required" name="required_message.ar" label="{{trans('tomato-forms::global.field.required_message')}} [{{trans('tomato-forms::global.lang.ar')}}]" />
        <x-splade-textarea v-if="form.is_required" name="required_message.en" label="{{trans('tomato-forms::global.field.required_message')}} [{{trans('tomato-forms::global.lang.en')}}]" />

        <x-splade-checkbox name="is_reactive" label="{{trans('tomato-forms::global.field.is_reactive')}}" />
        <div v-if="form.is_reactive">
            <div class="flex flex-col space-y-4">
                <x-splade-input name="reactive_field" type="text"  placeholder="{{trans('tomato-forms::global.field.is_reactive')}}" />
                <x-splade-input name="reactive_where" type="text"  placeholder="{{trans('tomato-forms::global.field.reactive_where')}}" />
            </div>
        </div>

        <x-splade-submit label="{{trans('tomato-admin::global.crud.update')}} {{trans('tomato-forms::global.field.single')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
