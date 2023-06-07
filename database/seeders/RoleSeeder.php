<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder {
    public function run(){
        $academicRole = Role::create(['name' => 'academic']);
        $adviserRole  = Role::create(['name' => 'adviser']);
        $readerRole   = Role::create(['name' => 'reader']);
    }
}
