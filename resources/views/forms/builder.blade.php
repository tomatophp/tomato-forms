<x-tomato-admin-container label="{{__('Form Builder')}}">
    <x-slot:buttons>
        <x-tomato-admin-button type="link" href="{{route('admin.forms.index')}}">
            <x-heroicon-s-arrow-left class="w-4 h-4" />
            {{__('Back')}}
        </x-tomato-admin-button>
        <x-tomato-admin-button confirm danger method="POST" type="link" href="{{route('admin.forms.clear', $model->id)}}">
            <x-heroicon-s-trash class="w-4 h-4" />
            {{__('Clear Form Fields')}}
        </x-tomato-admin-button>
        <x-tomato-admin-button warning type="link" href="{{route('admin.forms.show', $model->id)}}">
            <x-heroicon-s-eye class="w-4 h-4" />
            {{__('Preview')}}
        </x-tomato-admin-button>
    </x-slot:buttons>
    <x-splade-form method="POST" action="{{route('admin.forms.options', $model->id)}}">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 mb-4">
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'text'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg p-4">
                <x-tomato-icon icon="text" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Text')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'number'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg  p-4">
                <x-tomato-icon icon="number" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Number')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'date'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg  p-4">
                <x-tomato-icon icon="date" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Date')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'time'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg  p-4">
                <x-tomato-icon icon="time" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Time')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'checkbox'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg  p-4">
                <x-tomato-icon icon="checkbox" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Checkbox')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'radio'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg  p-4">
                <x-tomato-icon icon="radio" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Radio')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'range'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg  p-4">
                <x-tomato-icon icon="range" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Range')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'datetime'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg  p-4">
                <x-tomato-icon icon="datetime" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Date Time')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'rich'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg p-4">
                <x-tomato-icon icon="rich" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Rich Text')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'select'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg p-4">
                <x-tomato-icon icon="select" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Select')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'color'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg p-4">
                <x-tomato-icon icon="color" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Color')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'textarea'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg p-4">
                <x-tomato-icon icon="textarea" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('Textarea')}}</h3>
            </x-splade-link>
            <x-splade-link method="POST" href="{{route('admin.forms.options', $model->id)}}" data="{type: 'file'}" class="cursor-pointer flex flex-col jusitify-center items-center gap-2 w-full border rounded-lg p-4">
                <x-tomato-icon icon="file" class="w-8 h-8" />
                <h3 class="text-sm text-center">{{__('File')}}</h3>
            </x-splade-link>
        </div>
        @if(count($options))
            <x-tomato-admin-draggable
                class="cursor-move"
                :levels="1" :options="$options->toArray()" order-by="order" url="{{route('admin.forms.order', $model->id)}}">
                <div class="rounded-lg border bg-white">
                    <x-splade-form default="drag.item" preserve-scroll method="POST" v-bind:action="'{{url('admin/form-options')}}/'+drag.item.id">
                        <div class="p-4 flex justifiy-between gap-2">
                            <div class="flex justifiy-start gap-2 w-full mt-2">
                                <div>
                                    <x-tomato-icon icon="`${drag.item.type}`" class="w-5 h-5" />
                                </div>
                                <h1 class="font-bold">@{{ drag.item.type.toUpperCase() }}</h1>
                            </div>

                            <div>
                                <x-tomato-admin-button confirm method="DELETE" danger v-bind:href="'{{url('admin/form-options')}}/'+drag.item.id">
                                    <x-heroicon-s-trash class="w-4 h-4" />
                                    {{__('Delete')}}
                                </x-tomato-admin-button>
                            </div>
                        </div>
                        <hr>
                        <div class="flex flex-col space-y-4 justify-start p-4 w-full">
                            <x-splade-data
                                    default="{showLabel:false, showOptions:false}"
                                    local-storage
                                    v-bind:remember="'input-'+drag.item.id"
                            >
                                <div class="flex justifiy-between gap-2">
                                    <x-splade-input class="w-full" name="name" :label="__('Key')" :placeholder="__('Key')" />
                                    <x-splade-input class="w-full" name="default" :label="__('Default')" :placeholder="__('Default')" />
                                    <button title="{{__('Label')}}" @click.prevent="data.showLabel = !data.showLabel">
                                        <x-heroicon-s-chevron-double-up v-show="data.showLabel" class="w-5 h-5 mt-5 mx-2" />
                                        <x-heroicon-s-chevron-double-down v-show="!data.showLabel" class="w-5 h-5 mt-5 mx-2" />
                                    </button>
                                    <button title="{{__('Options')}}" @click.prevent="data.showOptions = !data.showOptions">
                                        <x-heroicon-s-cog class="w-5 h-5 mt-5 mx-2" />
                                    </button>
                                </div>

                                <div class="grid grid-cols-2 gap-4" v-show="data.showLabel">
                                    <div class="col-span-2">
                                        <x-tomato-translation  name="label" :label="__('Label')" :placeholder="__('Label')"/>
                                    </div>
                                    <x-tomato-translation name="placeholder" :label="__('Placeholder')" :placeholder="__('Placeholder')"/>
                                    <x-tomato-translation name="hint" :label="__('Hint')" :placeholder="__('Hint')"/>
                                </div>

                                <div v-show="data.showOptions">
                                    <x-splade-checkbox class="w-full" name="is_required" :label="__('Is Required?')" :placeholder="__('Is Required?')" />
                                    <div v-if="form.is_required" class="my-4">
                                        <x-tomato-translation name="required_message" :label="__('Required Message')" :placeholder="__('Required Message')"/>
                                    </div>
                                    <x-splade-checkbox class="w-full" name="has_validation" :label="__('Has Validation')" :placeholder="__('Has Validation')" />
                                    <div v-if="form.has_validation">
                                        <div class="border p-4 rounded-lg grid grid-cols-2 lg:grid-cols-4 gap-4 my-4">
                                            <x-splade-radio class="w-full" name="rules.type" value="email"  :label="__('Is Email?')" :placeholder="__('Is Email?')" />
                                            <x-splade-radio class="w-full" name="rules.type" value="int"  :label="__('Is Number?')" :placeholder="__('Is Number?')" />
                                            <x-splade-radio class="w-full" name="rules.type" value="string"  :label="__('Is Text?')" :placeholder="__('Is Text?')" />
                                            <x-splade-radio class="w-full" name="rules.type" value="dight"  :label="__('Is Dights?')" :placeholder="__('Is Dights?')" />
                                            <x-splade-input class="w-full col-span-2" name="rules.min" type="number" :label="__('Min Length')" :placeholder="__('Min Length')" />
                                            <x-splade-input class="w-full col-span-2" name="rules.max" type="number" :label="__('Max Length')" :placeholder="__('Max Length')" />
                                        </div>
                                    </div>
                                    <x-splade-checkbox class="w-full" name="is_reactive" :label="__('Is Reactive')" :placeholder="__('Is Reactive')" />
                                    <div v-if="form.is_reactive">
                                        <div class="flex justifiy-between gap-2 my-4">
                                            <x-splade-input class="w-full" name="reactive_field"  :label="__('Reactive When Field')" :placeholder="__('Reactive When Field')" />
                                            <x-splade-input class="w-full" name="reactive_where"   :label="__('Is Equle To')" :placeholder="__('Is Equle To')" />
                                        </div>
                                    </div>
                                    <div v-if="drag.item.type === 'select'">
                                        <x-splade-checkbox class="w-full" name="has_options" :label="__('Has Options')" :placeholder="__('Has Options')" />
                                        <div v-if="form.has_options" class="my-4">
                                            <x-tomato-admin-repeater name="options" :options="['key', 'value_ar', 'value_en']">
                                                <div class="flex justifiy-between gap-2">
                                                    <x-splade-input class="w-full" v-model="repeater.main[key].key"  :label="__('Option Value')" :placeholder="__('Option Value')" />
                                                    <x-splade-input class="w-full" v-model="repeater.main[key].value_ar"   :label="__('Option Label [AR]')" :placeholder="__('Option Label [AR]')" />
                                                    <x-splade-input class="w-full" v-model="repeater.main[key].value_en"   :label="__('Option Label [EN]')" :placeholder="__('Option Label [EN]')" />
                                                </div>
                                            </x-tomato-admin-repeater>
                                        </div>
                                    </div>
                                    <div v-if="drag.item.type === 'select'">
                                        <x-splade-checkbox class="w-full" name="is_from_table" :label="__('Get Data From Endpoint')" :placeholder="__('Get Data From Table')" />
                                        <div v-if="form.is_from_table" class="my-4">
                                            <x-splade-input class="w-full" name="table_name"  :label="__('Endpoint')" :placeholder="__('Table Name')" />
                                        </div>
                                    </div>
                                    <x-splade-checkbox v-if="drag.item.type === 'select' || drag.item.type === 'file'" class="w-full" name="is_multi" :label="__('Is Multi')" :placeholder="__('Is Multi')" />

                                </div>
                            </x-splade-data>
                        </div>

                        <hr>
                        <div class="flex justify-start gap-2 text-center p-2">
                            <x-tomato-admin-submit :label="__('Update')" :spinner="true" />
                        </div>
                    </x-splade-form>
                </div>
            </x-tomato-admin-draggable>
        @else
            <div class="cursor-move flex flex-col gap-4 items-center text-center justifiy-center w-full border rounded-lg p-4">
                <x-heroicon-s-arrows-pointing-in class="w-12 h-12" />
                {{__('Click On Any Input Type To Add It Here')}}
            </div>
        @endif
    </x-splade-form>
</x-tomato-admin-container>
