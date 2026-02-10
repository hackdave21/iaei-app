<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AgriculturalYield;
use App\Models\AgriculturalModel;

class AgriculturalYieldSeeder extends Seeder
{
    public function run(): void
    {
        $models = AgriculturalModel::all();
        
        foreach ($models as $model) {
            // Création de 3 scénarios de rendement par modèle
            AgriculturalYield::create([
                'agricultural_model_id' => $model->id,
                'condition' => 'Optimale',
                'yield_variance' => 1.0,
                'description' => 'Conditions météo et sanitaires parfaites'
            ]);
            
            AgriculturalYield::create([
                'agricultural_model_id' => $model->id,
                'condition' => 'Moyenne',
                'yield_variance' => 0.85,
                'description' => 'Quelques aléas climatiques'
            ]);
            
            AgriculturalYield::create([
                'agricultural_model_id' => $model->id,
                'condition' => 'Difficile',
                'yield_variance' => 0.60,
                'description' => 'Problèmes majeurs ou sécheresse'
            ]);
        }
    }
}
