<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    protected function roles()
    {
        return [
            ["name" => "superadmin"],
            ["name" => "employee"],
        ];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles() as $value) {
            Role::firstOrCreate($value,$value);
        }
    }
}
