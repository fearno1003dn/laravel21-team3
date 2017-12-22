<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoomSizesTableSeeder::class);
         $this->call(RoomTypesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}
