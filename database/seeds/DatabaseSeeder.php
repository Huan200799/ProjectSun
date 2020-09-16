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
        DB::table('users')->insert([
            ['name_user' => 'admin'],
            ['email' => 'admin@gmail.com'],
            ['password' => 'Hoang123'],
            ['address' => 'Da nang'],
            ['phone' => '0335999943'],
            ['level' => '1'],
        ]);
    }
}
