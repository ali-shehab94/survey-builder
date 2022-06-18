<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [];

        foreach(range(1, 5) as $index)
        {
            $users[] = [
                'name' => $name = "User$index",
                'email' => "$name@gmail.com",
                'user_type' => 1,
                'password' => 123
            ];
        }
        DB::table('users')->insert($users);
    }
}
