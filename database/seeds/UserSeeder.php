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
      DB::table('users')->insert(['id' =>12, 'name' =>'admin', 'password' => bcrypt('secret'), 'email'=> 'admin@admin.com']);
    }
}
