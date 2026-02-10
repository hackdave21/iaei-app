<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Note: This model was listed in plan but I don't see a specific table for it in the migrations I analyzed.
// However in the requested list: AgriculturalYield.
// Looking at migrations again:
// 2026_02_10_122124_create_agricultural_models_table.php (yield_per_unit is here)
// 2026_02_10_122141_create_agricultural_costs_table.php
// 2026_02_10_122156_create_agricultural_rois_table.php
// I will assuming 'AgriculturalYield' might be a misunderstanding of 'AgriculturalModel' or I missed a migration.
// Checking file list again:
// 2026_02_10_122124_create_agricultural_models_table.php
// 2026_02_10_122141_create_agricultural_costs_table.php
// 2026_02_10_122156_create_agricultural_rois_table.php
// There is no separate yield table. Yield info is in AgriculturalModel.
// I will SKIP generating AgriculturalYield.php as there is no table for it.

// Wait, I should not generate code in this block if I am skipping it.
// I will create a dummy class if strictly requested, but checking the prompt "Se baser UNIQUEMENT sur les tables existantes".
// So I will NOT generate AgriculturalYield.php.
