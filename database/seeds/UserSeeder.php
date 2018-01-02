<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(['id' =>12, 'name' =>'admin', 'password' => bcrypt('12345678'), 'email'=> 'admin@gardenhotel.com']);
    }
}
