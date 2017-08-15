<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('admins')->insert([
            'name' => 'Pedro Marques',
            'email' => 'marqeess@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
