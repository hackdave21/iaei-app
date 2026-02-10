<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AgriculturalRoi;
use App\Models\AgriculturalModel;

class AgriculturalRoiSeeder extends Seeder
{
    public function run(): void
    {
        $models = AgriculturalModel::all();
        
        foreach ($models as $model) {
            AgriculturalRoi::create([
                'agricultural_model_id' => $model->id,
                'initial_investment' => 2000000,
                'projected_revenue' => 3500000,
                'projected_profit' => 1500000,
                'roi_percentage' => 75.0,
                'payback_period_months' => 8
            ]);
        }
    }
}
