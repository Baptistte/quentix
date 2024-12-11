<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

     public function run()
     {
         Role::create(['name' => 'admin']);
         Role::create(['name' => 'user']);
     
         Permission::create(['name' => 'manage sites']);
         Permission::create(['name' => 'view dashboard']);
     }
}
