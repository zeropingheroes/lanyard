<?php

use Illuminate\Database\Seeder;
use Zeropingheroes\Lanyard\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Super Admin'],
            ['name' => 'Admin'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
