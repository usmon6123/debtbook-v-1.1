<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {

    }


    public function boot()
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Asia/Tashkent'); // O'zgartiriladigan vaqt mintaqasini tanlash
        Carbon::setToStringFormat('Y-m-d H:i:s');
        // Qolgan kodlar
    }
}
