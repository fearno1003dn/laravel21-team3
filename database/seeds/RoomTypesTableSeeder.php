<?php

use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            ['name' => 'VIP', 'description' => 'VIP Room '],
            ['name' => 'DELUXE', 'description' => 'DELUXE Room'],
            ['name' => 'FAMILY', 'description' => 'FAMILY Room']
        ]);
    }
}
