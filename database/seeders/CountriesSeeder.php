<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name' => 'Казахстан'],
            ['name' => 'Россия'],
            ['name' => 'Убекистан'],
        ];
        DB::table('countries')->insert($countries);
    }
}
