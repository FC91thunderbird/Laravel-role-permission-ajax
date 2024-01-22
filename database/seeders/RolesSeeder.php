<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'manager', 'user'];

        foreach($roles as $role){
            $roles = new Role();
            $roles->name = $role;
            $roles->save();
        }
    }
}
