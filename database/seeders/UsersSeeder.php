<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'name' => "Super Admin",
            'email' => "admin@email.com",
           ],[
            'name' => "Super Admin",
            'email' => "admin@email.com",
            'password' => Hash::make("password")
        ]);

        $find_role = Role::where('name', 'superadmin')->first();

        $user->assignRole([$find_role->id]);
    }
}
