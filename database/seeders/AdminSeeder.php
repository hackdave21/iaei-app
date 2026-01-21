<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        // Si un admin existe déjà, on ne fait rien
        if (User::where('role','admin')->exists()) {
            return;
        }

        //  Promouvoir le premier utilisateur existant en admin
        $first = User::orderBy('id')->first();
        if ($first) {
            $first->update(['role' => 'admin']);
            return;
        }

        //  Sinon créer un admin par défaut
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
