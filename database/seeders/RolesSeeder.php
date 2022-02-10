<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'mentor',
                'description' => 'Наставник',
            ],
            [
                'name' => 'admin',
                'description' => 'Админ',
            ],
            [
                'name' => 'consultant',
                'description' => 'Консультант',
            ],
            [
                'name' => 'student',
                'description' => 'Ученик',
            ]
        ];
        DB::table('roles')->insert($data);
    }
}
