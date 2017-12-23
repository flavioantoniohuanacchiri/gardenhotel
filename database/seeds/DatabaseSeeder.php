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
        $this->call(ModuloSeeder::class);
        $this->call(PerfilModuloSeeder::class);
        $this->call(WebBannerSeeder::class);
        $this->call(UserSeeder::class);
    }
}
