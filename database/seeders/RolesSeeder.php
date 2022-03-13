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
                'name' => 'admin',
                'description' => 'Админ',
            ],
            [
                'name' => 'student',
                'description' => 'Ученик',
            ],
            [
                'name' => 'mentor',
                'description' => 'Наставник',
            ],
            [
                'name' => 'paid_mentor',
                'description' => 'Платный наставник',
            ],
            [
                'name' => 'consultant',
                'description' => 'Консультант',
            ],
            [
                'name' => 'paid_consultant',
                'description' => 'Платный консультант',
            ],
        ];
        DB::table('roles')->insert($data);
    }
}
