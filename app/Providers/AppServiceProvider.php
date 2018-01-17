<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\RoomType;
use Illuminate\Support\Facades\View;
use App\RoomSize;
use App\Room;
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
        if (\Schema::hasTable('room_types')){
            $roomTypes = RoomType::all()->pluck('name', 'id');
            View::share('roomTypes', $roomTypes);
            $roomTypesListIndex = RoomType::all();
            View::share('roomTypesListIndex', $roomTypesListIndex);
        }
        if (\Schema::hasTable('room_sizes')){
            $sizes = RoomSize::all()->pluck('name', 'id');
            View::share('sizes', $sizes);
            $sizesListIndex = RoomSize::all();
            View::share('sizesListIndex', $sizesListIndex);
        }
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
