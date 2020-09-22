<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            AdsTableSeeder::class,
            CategoryTableSeeder::class,
            CountryTableSeeder::class,
            CurrencyTableSeeder::class,
            FavoriteTableSeeder::class,
            ImageTableSeeder::class
        ]);
    }
}
