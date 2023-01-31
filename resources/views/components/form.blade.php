<x-splade-form :method="$method" :action="$action">
   <div class="flex flex-col space-y-4">
       @foreach($fields as $field)
           @if($field->is_reactive)
               <div v-if="form[@js($field->reactive_field)] === @js($field->reactive_where)">
                   @if($field->type === 'date')
                       <x-splade-input date :name="$field->key" :type="$field->type" :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
                   @elseif($field->type === 'datetime')
                       <x-splade-input date time :name="$field->key" :type="$field->type"   :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
                   @elseif($field->type === 'time')
                       <x-splade-input  time :name="$field->key" :type="$field->type"   :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
                   @elseif($field->type === 'select')
                       <x-splade-select :name="$field->key" :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}">
                           @if($field->has_options)
                               @foreach($field->options as $option)
                                   <option value="{{$option->key}}">{{$option->label}}</option>
                               @endforeach
                           @endif
                       </x-splade-select>
                   @elseif($field->type === 'password')
                       <x-splade-input  :name="$field->key" :type="$field->type"   :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
                       <x-splade-input  name="{{$field->key.'_confirmation'}}" :type="$field->type"   placeholder="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key)) . ' Confirmation'}}" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key)) . ' Confirmation'}}" required="{{$field->is_required}}"/>
                   @elseif($field->type === 'textarea')
                       <x-splade-textarea  :name="$field->key" :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
                   @elseif(
                       $field->type === 'text' ||
                       $field->type === 'number' ||
                       $field->type === 'email' ||
                       $field->type === 'tel'
                   )
                       <x-splade-input :name="$field->key" :type="$field->type"   :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" :label="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" required="{{$field->is_required}}"/>
                   @endif
               </div>

           @else
               @if($field->type === 'date')
                   <x-splade-input date :name="$field->key" :type="$field->type" :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
               @elseif($field->type === 'datetime')
                   <x-splade-input date time :name="$field->key" :type="$field->type"   :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
               @elseif($field->type === 'time')
                   <x-splade-input time :name="$field->key" :type="$field->type"   :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
               @elseif($field->type === 'select')
                   <x-splade-select :name="$field->key" :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}">
                       @if($field->has_options)
                           @foreach($field->options as $option)
                               <option value="{{$option->key}}">{{$option->label}}</option>
                           @endforeach
                       @endif
                   </x-splade-select>
               @elseif($field->type === 'password')
                   <x-splade-input :name="$field->key" :type="$field->type"   :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
                   <x-splade-input name="{{$field->key.'_confirmation'}}" :type="$field->type"   placeholder="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key)) . ' Confirmation'}}" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key)) . ' Confirmation'}}" required="{{$field->is_required}}"/>
               @elseif($field->type === 'textarea')
                   <x-splade-textarea :name="$field->key" :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" label="{{$field->label ?? ucfirst(str_replace('_',' ',$field->key))}}" required="{{$field->is_required}}"/>
               @elseif(
                   $field->type === 'text' ||
                   $field->type === 'number' ||
                   $field->type === 'email' ||
                   $field->type === 'tel'
               )
                   <x-splade-input :name="$field->key" :type="$field->type"   :placeholder="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" :label="$field->label ?? ucfirst(str_replace('_',' ',$field->key))" required="{{$field->is_required}}"/>
               @endif
           @endif
       @endforeach
   </div>

    <x-splade-submit class="my-4" label="Submit" />
</x-splade-form>
