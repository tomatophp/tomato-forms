<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} Field #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-forms::global.field.type')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->type}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-forms::global.field.label')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->label}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-forms::global.field.key')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->key}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-forms::global.field.default')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      @if($model->default)
                          <h1>{{$model->default}}</h1>
                      @else
                          <h1>{{trans('tomato-forms::global.field.not')}}</h1>
                      @endif
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-forms::global.field.has_options')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      @if($model->has_options)
                          <x-heroicon-s-check-circle class="text-green-600 h-8 w-8 ltr:mr-2 rtl:ml-2"/>
                      @else
                          <x-heroicon-s-x-circle class="text-red-600 h-8 w-8 ltr:mr-2 rtl:ml-2"/>
                      @endif
                  </h3>
              </div>
          </div>

    </div>
</x-splade-modal>
