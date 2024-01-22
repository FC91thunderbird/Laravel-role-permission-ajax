<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['id' => 1, 'name' => 'main admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin'), 'roleId'=>1],
            ['id' => 2, 'name' => 'main manager', 'email' => 'manager@gmail.com', 'password' => bcrypt('manager'), 'roleId'=>2],
            ['id' => 3, 'name' => 'main user', 'email' => 'user@gmail.com', 'password' => bcrypt('user'), 'roleId'=>3],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
