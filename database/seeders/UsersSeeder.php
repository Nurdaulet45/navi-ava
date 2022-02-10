<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
           'admin', 'mentor', 'consultant', 'student'
        ];
        $specializations = [
            'Рекрутер',
        ];
        $address = [
            'Москва', 'Алматы', 'Шымкент', 'Астана'
        ];
        \App\Models\User::factory(10)->create()->each(function ($user) use($roles, $address, $specializations) {
            $roleNumber = rand(0, count($roles));
            $user->assignRole($roles[$roleNumber]);
            $user->address = $address[$roleNumber];
            $user->specialization_text = $specializations[$roleNumber];
        });
    }
}
