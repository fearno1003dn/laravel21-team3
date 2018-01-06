<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\RoomType;
use Illuminate\Support\Facades\View;
use App\RoomSize;
use App\Http\Requests\CheckFindRoomRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $roomTypes = RoomType::all();
        View::share('roomTypes', $roomTypes);
        $sizes = RoomSize::all();
        View::share('sizes', $sizes);
        \Schema::defaultStringLength(191);
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
