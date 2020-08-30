<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $user = [
            'name' => 'twist' ,
            'email' => 'twistedgood@gmail.com' ,
            'password' => '$2y$10$IDeuN4eNiL1d5vXKCbL9pO2N6v3UIuvLaIuZ1lEylSqkKwK/htJyy' ,
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('users')->insert($user);
    }
}
