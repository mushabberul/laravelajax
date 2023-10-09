<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::insert([
            ['role_name' => 'Super Admin'],
            ['role_name' => 'Admin'],
            ['role_name' => 'Sub Admin'],
        ]);
    }
}
