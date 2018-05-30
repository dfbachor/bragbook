<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); 

        //the following make the system table available to
        // anywhere in the laravel project - cool
        //
        // access it line app('system')->companyName etc...
        $this->app->singleton('system', function() {

            $user = \Auth::user(); // get the current user
            if(is_null($user)) {
                $system = \DB::table('systems')->find(1); // find the master system                   
            } else {
                $system = \DB::table('systems')->find($user->systemID); // find the current system                  
            }
            return $system; // share the $system;
        });    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
