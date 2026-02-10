<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Administrateur',
                'slug' => 'admin',
                'description' => 'Accès complet au système',
            ],
            [
                'name' => 'Commercial',
                'slug' => 'commercial',
                'description' => 'Gestion des leads et devis',
            ],
            [
                'name' => 'Analyste',
                'slug' => 'analyste',
                'description' => 'Accès aux rapports et analytics',
            ],
            [
                'name' => 'Client',
                'slug' => 'client',
                'description' => 'Accès limité au portail client',
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['slug' => $role['slug']], $role);
        }
    }
}
