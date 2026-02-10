<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Admin: Toutes les permissions
        $adminRole = Role::where('slug', 'admin')->first();
        if ($adminRole) {
            $allPermissions = Permission::all();
            $adminRole->permissions()->sync($allPermissions);
        }

        // Commercial: CRM, Simulations, Devis
        $commercialRole = Role::where('slug', 'commercial')->first();
        if ($commercialRole) {
            $commercialPermissions = Permission::whereIn('slug', [
                'leads.view', 'leads.manage',
                'simulation.use', 'simulation.results',
                'quotations.manage',
                'users.view'
            ])->get();
            $commercialRole->permissions()->sync($commercialPermissions);
        }

        // Analyste: Analytics, Simulations
        $analystRole = Role::where('slug', 'analyste')->first();
        if ($analystRole) {
            $analystPermissions = Permission::whereIn('slug', [
                'analytics.view',
                'simulation.results',
                'leads.view'
            ])->get();
            $analystRole->permissions()->sync($analystPermissions);
        }
    }
}
