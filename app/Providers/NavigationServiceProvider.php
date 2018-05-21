<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       //$this->siteAuditHeader();
       $this->composerHeader();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
     public function composerHeader(){
        view()->composer('shared.navbar', '\App\Http\Composers\Navigation');
    }

    // public function siteAuditHeader(){
    //     view()->composer('shared.navbar', '\App\Http\Composers\Navigation@site_audit');
    // }
}
