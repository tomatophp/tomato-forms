<?php

namespace TomatoPHP\TomatoForms\Menus;

use TomatoPHP\TomatoPHP\Services\Menu\Menu;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenu;

class FormMenu extends TomatoMenu
{
    /**
     * @var ?string
     * @example ACL
     */
    public ?string $group = "Forms";

    /**
     * @var ?string
     * @example dashboard
     */
    public ?string $menu = "dashboard";

    /**
     * @return array
     */

    public function __construct()
    {
        $this->group = trans('tomato-forms::global.form.group');
    }

    public static function handler(): array
    {
        return [
            Menu::make()
                ->label(trans('tomato-forms::global.form.title'))
                ->icon("bx bxs-notepad")
                ->route("admin.forms.index")
        ];
    }
}
