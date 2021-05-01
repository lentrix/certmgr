<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Benjie B. Lenteria',
            'email' => 'benjielenteria@mdc.ph',
            'password' => bcrypt('password123')
        ]);

    }
}
