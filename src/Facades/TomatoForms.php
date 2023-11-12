<?php

namespace TomatoPHP\TomatoForms\Facades;

use Illuminate\Support\Facades\Facade;
use TomatoPHP\TomatoForms\Services\Contracts\Form;


/**
 * @method static register(Form $page)
 * @method array getForms(Form $page)
 * @method void build()
 */
class TomatoForms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tomato-forms';
    }
}
