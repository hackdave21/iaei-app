<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminSetting;

class AdminSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'AIAE Application', 'group' => 'general'],
            ['key' => 'support_email', 'value' => 'support@aiae.tg', 'group' => 'general'],
            
            // Simulation
            ['key' => 'default_currency', 'value' => 'XOF', 'group' => 'simulation'],
            ['key' => 'solar_irradiation_default', 'value' => '5.5', 'group' => 'simulation'], // kWh/m²/jour
            
            // Commercial
            ['key' => 'quotation_validity_days', 'value' => '30', 'group' => 'commercial'],
            ['key' => 'tva_rate', 'value' => '18', 'group' => 'commercial'],
        ];

        foreach ($settings as $setting) {
            AdminSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
