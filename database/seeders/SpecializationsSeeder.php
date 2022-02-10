<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Экономика'],
            ['name' => 'Промышленность'],
            ['name' => 'Строительство'],
            ['name' => 'Торговая отрасль'],
            ['name' => 'Образование'],
            ['name' => 'Здравоохранение'],
            ['name' => 'Транспорт'],
            ['name' => 'Сельское хозяйство'],
            ['name' => 'Искусство и культура'],
            ['name' => 'Бизнес и предпринимательство'],
            ['name' => 'IT'],
            ['name' => 'Красота и мода'],
            ['name' => 'Лингвистика'],
            ['name' => 'Маркетинг, реклама и PR'],
            ['name' => 'Менеджмент и управление'],
            ['name' => 'Наука'],
            ['name' => 'Сервис и туризм'],
            ['name' => 'СМИ и издательство'],
            ['name' => 'Спорт'],
            ['name' => 'Животные'],
            ['name' => 'Другое'],
        ];
        DB::table('specializations')->insert($data);
    }
}
