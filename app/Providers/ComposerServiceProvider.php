<?php

namespace App\Providers;

use App\Http\ViewComposers\HottestComposer;
use App\Http\ViewComposers\OfficialComposer;
use App\Http\ViewComposers\OfficialRankComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('public.tabs.hottestTab', HottestComposer::class);
        View::composer('public.tabs.officialTab', OfficialComposer::class);
        View::composer('public.tabs.officialRankTab', OfficialRankComposer::class);
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
}
