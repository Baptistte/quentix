<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        Plan::create(['name' => 'Basic', 'price' => 10.00, 'duration_months' => 1, 'features' => 'Feature 1, Feature 2']);
        Plan::create(['name' => 'Premium', 'price' => 30.00, 'duration_months' => 3, 'features' => 'Feature 1, Feature 2, Feature 3']);
    }
}