<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Utilisateurs & Rôles
            ['name' => 'Voir utilisateurs', 'slug' => 'users.view', 'description' => 'Voir la liste des utilisateurs'],
            ['name' => 'Gérer utilisateurs', 'slug' => 'users.manage', 'description' => 'Créer, modifier et supprimer des utilisateurs'],
            
            // CRM
            ['name' => 'Voir leads', 'slug' => 'leads.view', 'description' => 'Voir les leads'],
            ['name' => 'Gérer leads', 'slug' => 'leads.manage', 'description' => 'Assigner et traiter les leads'],
            
            // Simulateur
            ['name' => 'Utiliser simulateur', 'slug' => 'simulation.use', 'description' => 'Accès au simulateur solaire/agricole/construction'],
            ['name' => 'Voir résultats simulation', 'slug' => 'simulation.results', 'description' => 'Voir les résultats détaillés'],
            
            // Devis & Facturation
            ['name' => 'Gérer devis', 'slug' => 'quotations.manage', 'description' => 'Créer et envoyer des devis'],
            
            // Analytics
            ['name' => 'Voir analytics', 'slug' => 'analytics.view', 'description' => 'Accès aux tableaux de bord'],
            
            // Administration
            ['name' => 'Accès admin', 'slug' => 'admin.access', 'description' => 'Accès au panneau d\'administration'],
            ['name' => 'Gérer configuration', 'slug' => 'settings.manage', 'description' => 'Modifier les paramètres du système'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['slug' => $permission['slug']], $permission);
        }
    }
}
