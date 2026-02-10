<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@aiae.tg'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('P@ssword123!'), // A changer en prod
                'email_verified_at' => now(),
            ]
        );

        $adminRole = Role::where('slug', 'admin')->first();
        if ($adminRole && !$admin->roles->contains($adminRole->id)) {
            $admin->roles()->attach($adminRole);
        }

        // Demo Commercial
        $commercial = User::firstOrCreate(
            ['email' => 'commercial@aiae.tg'],
            [
                'name' => 'Jean Commercial',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        
        $commercialRole = Role::where('slug', 'commercial')->first();
        if ($commercialRole && !$commercial->roles->contains($commercialRole->id)) {
            $commercial->roles()->attach($commercialRole);
        }
    }
}
