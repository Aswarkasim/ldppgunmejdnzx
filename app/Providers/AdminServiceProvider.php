<?php

namespace App\Providers;

use App\Models\Configuration;
use App\Models\Dashboard;
use App\Models\Periode;
use App\Models\RegisterSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $periode = Periode::get();
        // View::share('provider_periode', $periode);

        $config = Configuration::first();

        $register = RegisterSetting::first();

        //share  variabel periode dan config ke view
        View::share('provider_periode', $periode);
        View::share('provider_config', $config);
        View::share('provider_register_setting', $register);
    }
}
