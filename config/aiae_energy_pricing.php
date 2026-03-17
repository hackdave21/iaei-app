<?php

return [
    /*
    |--------------------------------------------------------------------------
    | AIAE Energy Pricing Configuration (CONFIDENTIAL)
    |--------------------------------------------------------------------------
    | This file contains the base prices for solar kits and other components.
    | These prices are used for backend estimation and should not be exposed
    | directly to the frontend.
    */

    'solar_kits' => [
        'kit_3kw' => [
            'designation' => 'Kit Solaire Hybride 3kW Lithium',
            'prix_min' => 4500000,
            'prix_max' => 6000000,
            'puissance_wc' => 3000,
            'onduleur_kva' => 5,
            'batterie_kwh' => 4.8,
        ],
        'kit_5kw' => [
            'designation' => 'Kit Solaire Hybride 5kW Lithium',
            'prix_min' => 7500000,
            'prix_max' => 10000000,
            'puissance_wc' => 5000,
            'onduleur_kva' => 8,
            'batterie_kwh' => 9.6,
        ],
        'kit_10kw' => [
            'designation' => 'Kit Solaire Hybride 10kW Lithium',
            'prix_min' => 14000000,
            'prix_max' => 18000000,
            'puissance_wc' => 10000,
            'onduleur_kva' => 12,
            'batterie_kwh' => 14.4,
        ],
    ],

    'generators' => [
        'diesel_10kva' => [
            'designation' => 'Groupe Diesel 10kVA Silencieux',
            'prix_min' => 4500000,
            'prix_max' => 6500000,
        ],
        'diesel_20kva' => [
            'designation' => 'Groupe Diesel 20kVA Silencieux',
            'prix_min' => 7500000,
            'prix_max' => 9500000,
        ],
        'diesel_45kva' => [
            'designation' => 'Groupe Diesel 45kVA Silencieux',
            'prix_min' => 11000000,
            'prix_max' => 14000000,
        ],
    ],

    'installation_fees' => [
        'fixed' => 500000,
        'variable_solar_wc' => 150, // FCFA per Watt-crête
    ],

    'biogas' => [
        'digester_margin' => 1.25, // 25% margin on top of cost
        'maintenance_annual' => 0.02, // 2% of CAPEX
    ]
];
