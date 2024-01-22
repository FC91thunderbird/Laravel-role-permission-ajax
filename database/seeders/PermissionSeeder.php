<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $endPoints = ['user','role','permission'];
        $types = ['create','read','update','delete'];

        foreach($endPoints as $end){
            foreach($types as $type){
                $permission = new Permission();
                $permission->name = $type ."-".$end;
                $permission->save();
            }
        }
    }
}
