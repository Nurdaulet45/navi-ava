<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Алматы'],
            ['name' => 'Нур-султан (Астана)'],
            ['name' => 'Шымкент'],
            ['name' => 'Актобе (Актюбинск)'],
            ['name' => 'Караганда'],
            ['name' => 'Тараз (Жамбыл)'],
            ['name' => 'Павлодар'],
            ['name' => 'Атырау'],
            ['name' => 'Усть-Каменогорск (Өскемен)'],
            ['name' => 'Семей (Семипалатинск)'],
            ['name' => 'Уральск'],
            ['name' => 'Кызылорда'],
            ['name' => 'Костанай'],
            ['name' => 'Петропавловск'],
            ['name' => 'Актау'],
            ['name' => 'Темиртау'],
            ['name' => 'Туркестан'],
            ['name' => 'Кокшетау'],
            ['name' => 'Талдыкорган'],
            ['name' => 'Экибастуз'],
            ['name' => 'Рудный'],
            ['name' => 'Жанаозен'],
            ['name' => 'Жезказган'],
            ['name' => 'Балхаш'],
            ['name' => 'Кентау'],
            ['name' => 'Каскелен'],
            ['name' => 'Сатпаев'],
            ['name' => 'Кульсары'],
            ['name' => 'Риддер'],
            ['name' => 'Степногорск'],
            ['name' => 'Капшагай'],
            ['name' => 'Жаркент'],
            ['name' => 'Талгар'],
            ['name' => 'Аягоз'],
            ['name' => 'Байконур'],
            ['name' => 'Чу (Шу)'],
        ];

        foreach ($cities as $city) {
            City::query()->create($city);
        }
    }
}
