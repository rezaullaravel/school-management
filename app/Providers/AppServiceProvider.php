<?php

namespace App\Providers;

use App\Models\Principal;
use App\Models\Setting;
use App\Models\subCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $subCategories = subCategory::all()->groupBy('category');
        $setting = Setting::find(1);
        $principal = Principal::get()->first();
        View::share([
            'subCategories' => $subCategories,
            'setting' => $setting,
            'principal' => $principal,
        ]);
        Paginator::useBootstrapFour();
    }
}
