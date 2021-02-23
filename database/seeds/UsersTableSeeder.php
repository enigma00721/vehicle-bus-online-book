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
            'name' => 'admin1',
            'email' => 'admin@admin.com',
            'is_customer' => '0',
            'password' => bcrypt('admin'),
            ]);
            DB::table('users')->insert([
                'name' => 'admin2',
                'is_customer' => '0',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
