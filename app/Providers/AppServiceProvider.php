<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\RoomType;
use Illuminate\Support\Facades\View;
use App\Room;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        $roomTypes = RoomType::all();
        View::share('roomTypes', $roomTypes);
        $amount_people = Room::all();
        View::share('amount_people', $amount_people);
    }

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
