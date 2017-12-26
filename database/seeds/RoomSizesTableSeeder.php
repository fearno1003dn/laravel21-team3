<?php

use Illuminate\Database\Seeder;

class RoomSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_sizes')->insert([
            ['name' => 'Room for 2 Pepple', 'size' => '2'],
            ['name' => 'Room for 4 Pepple', 'size' => '4'],
            ['name' => 'Room for 6 Pepple', 'size' => '6'],
        ]);
    }
}
