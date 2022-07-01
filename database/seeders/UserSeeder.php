<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();
        $users = [[
            'name' => 'Bisho Moise',
            'username' => 'Shobi',
            'email' => 'bisho@gmail.com',
            'password' => Hash::make('bisho@gmail.com'),
        ]];
        foreach($users as $user => $value)
            {
                User::create($value);
            }
    }
}
