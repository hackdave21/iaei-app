<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        $divisions = [
            ['name' => 'Construction', 'slug' => 'construction', 'description' => 'BTP et Génie Civil'],
            ['name' => 'Énergies Renouvelables', 'slug' => 'enr', 'description' => 'Solaire, Éolien, Biomasse'],
            ['name' => 'Sécurité Électronique', 'slug' => 'security', 'description' => 'Vidéosurveillance, Contrôle d\'accès'],
            ['name' => 'Préfabrication', 'slug' => 'prefab', 'description' => 'Éléments en béton préfabriqués'],
            ['name' => 'Agriculture', 'slug' => 'agriculture', 'description' => 'Solutions agricoles intégrées (solaire + irrigation)'],
        ];

        foreach ($divisions as $division) {
            Division::firstOrCreate(['slug' => $division['slug']], $division);
        }
    }
}
