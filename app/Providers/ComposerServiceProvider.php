<?php

namespace App\Providers;

use App\Http\Composers\Frontend\DashboardComposer;
use Illuminate\Support\Facades\View;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\Backend\SidebarComposer;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Global
         */
        View::composer('*', GlobalComposer::class);

        /*
         * Frontend
         */
        View::composer('frontend.user.dashboard', DashboardComposer::class);

        /*
         * Backend
         */
        View::composer('backend.includes.sidebar', SidebarComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
