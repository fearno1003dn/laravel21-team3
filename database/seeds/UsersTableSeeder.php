<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        ['first_name'=>'Thinh', 'last_name' => 'VIP',
         'email' => 'thinh@gmail.com', 'password' => bcrypt('123456'),
        'role' => '1', 'phone_number' => '999 ',
         'address' => '193 NLB', 'active' => '1'],

         ['first_name'=>'Hoa', 'last_name' => 'DELUXE',
          'email' => 'hoa@gmail.com', 'password' => bcrypt('123456'),
         'role' => '1', 'phone_number' => '999 ',
          'address' => '193 NLB', 'active' => '1'],

          ['first_name'=>'Tung', 'last_name' => 'FAMILY',
           'email' => 'tung@gmail.com', 'password' => bcrypt('123456'),
          'role' => '1', 'phone_number' => '999 ',
           'address' => '193 NLB', 'active' => '1']
             ]);
    }

}
