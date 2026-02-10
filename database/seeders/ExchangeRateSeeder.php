<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExchangeRate;
use App\Models\Currency;

class ExchangeRateSeeder extends Seeder
{
    public function run(): void
    {
        // Supposons XOF comme base implicite ou conversions directes
        $rates = [
            ['from_currency' => 'EUR', 'to_currency' => 'XOF', 'rate' => 655.957],
            ['from_currency' => 'USD', 'to_currency' => 'XOF', 'rate' => 600.000], // Taux fixe indicatif
        ];

        foreach ($rates as $rate) {
            ExchangeRate::create($rate);
        }
    }
}
