<?php

namespace TomatoPHP\TomatoForms;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoForms\Console\GenerateForm;
use TomatoPHP\TomatoForms\Console\TomatoFormsInstall;
use TomatoPHP\TomatoForms\Menus\FormMenu;
use TomatoPHP\TomatoForms\Views\Form;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;


class TomatoFormsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
            TomatoFormsInstall::class,
            GenerateForm::class
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-forms.php', 'tomato-forms');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-forms.php' => config_path('tomato-forms.php'),
        ], 'tomato-forms-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-forms-migrations');

        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-forms');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-forms'),
        ], 'tomato-forms-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-forms');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => app_path('lang/vendor/tomato-forms'),
        ], 'tomato-forms-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        //Register Components
        $this->loadViewComponentsAs('tomato', [
            Form::class
        ]);

        //Register Menu
        TomatoMenuRegister::registerMenu(FormMenu::class);
    }

    public function boot(): void
    {
        //you boot methods here
    }
}
