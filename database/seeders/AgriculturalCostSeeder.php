<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AgriculturalCost;
use App\Models\AgriculturalModel;

class AgriculturalCostSeeder extends Seeder
{
    public function run(): void
    {
        $models = AgriculturalModel::all();
        
        foreach ($models as $model) {
            AgriculturalCost::create([
                'agricultural_model_id' => $model->id,
                'name' => 'Intrants (Semences/Aliment)',
                'amount' => 50000,
                'frequency' => 'cycle', // par cycle
            ]);
             AgriculturalCost::create([
                'agricultural_model_id' => $model->id,
                'name' => 'Main d\'oeuvre',
                'amount' => 120000,
                'frequency' => 'monthly', // par mois
            ]);
        }
    }
}
