<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('Template.master', function ($view) {
            $profileId = Session::get('cid');
            $clientProfile = $profileId ? Client::find($profileId) : null;
    
            // Pass the data to the view
            $view->with(compact('clientProfile', 'profileId'));
        });
    }
}
