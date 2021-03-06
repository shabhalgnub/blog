<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'id' => 1,
            'name' => "الإمارات",
        ]);
        DB::table('countries')->insert([
            'id' => 2,
            'name' => "السعودية",
        ]);
        DB::table('countries')->insert([
            'id' => 3,
            'name' => "الكويت",
        ]);
        DB::table('countries')->insert([
            'id' => 4,
            'name' =>"البحرين",
        ]);
        DB::table('countries')->insert([
            'id' => 5,
            'name' =>"عُمان",
        ]);
        DB::table('countries')->insert([
            'id' =>6,
            'name' => "مصر",
        ]);
        DB::table('countries')->insert([
            'id' => 7,
            'name' => "اليمن",
        ]);
    }
}
