<?php

namespace LibbyJax\Crudgen;

use Illuminate\Support\ServiceProvider;

class CrudgenServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //publish config file
        $this->publishes([__DIR__.'/../config/crudgen.php' => config_path('crudgen.php')]);

        //default-theme
        $this->publishes([__DIR__.'/stubs/default-theme/' => resource_path('crudgen/views/default-theme/')]);

        //and default-layout
        $this->publishes([__DIR__.'/stubs/default-layout.stub' => resource_path('views/default.blade.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/crudgen.php', 'crudgen');

        $this->commands(
            'LibbyJax\Crudgen\Console\MakeCrud',
            'LibbyJax\Crudgen\Console\MakeViews',
            'LibbyJax\Crudgen\Console\RemoveCrud',
            'LibbyJax\Crudgen\Console\MakeApiCrud',
            'LibbyJax\Crudgen\Console\RemoveApiCrud'
        );
    }
}
