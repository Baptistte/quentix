<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    public function run()
    {
        DB::table('plans')->insert([
            [
                'name' => 'Plan Basique',
                'price' => 10.00,
                'features' => json_encode([
                    "sites_inclus" => 1,
                    "hebergement_securise" => true,
                    "certificat_ssl_inclus" => true,
                    "support_premium_24_7" => false,
                    "sauvegardes_automatiques" => false,
                    "gestion_multilingue" => false
                ]),
            ],
            [
                'name' => 'Plan Pro',
                'price' => 30.00,
                'features' => json_encode([
                    "sites_inclus" => 10,
                    "hebergement_securise" => true,
                    "certificat_ssl_inclus" => true,
                    "support_premium_24_7" => true,
                    "sauvegardes_automatiques" => true,
                    "gestion_multilingue" => false
                ]),
            ],
            [
                'name' => 'Plan Entreprise',
                'price' => 100.00,
                'features' => json_encode([
                    "sites_inclus" => 100,
                    "hebergement_securise" => true,
                    "certificat_ssl_inclus" => true,
                    "support_premium_24_7" => true,
                    "sauvegardes_automatiques" => true,
                    "gestion_multilingue" => true
                ]),
            ],
        ]);
    }
}