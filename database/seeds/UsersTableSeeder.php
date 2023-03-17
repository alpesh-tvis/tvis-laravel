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
        DB::table('users')->insert([
        'role_id' => '1',
        'name' => 'test',
        'email' => 'test@gmail.com',
        'password' => bcrypt('123456789'),
        ]);

        
    }
}
