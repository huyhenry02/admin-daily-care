<?php

namespace Database\Seeders;

use App\Models\CleaningOrder;
use App\Models\RevenueSystem;
use Illuminate\Database\Seeder;

class RevenueSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/revenue_systems.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            RevenueSystem::create([
                'id' => $item->id,
                'order_id' => $item->order_id,
                'revenue_percent' => $item->revenue_percent,
                'revenue_amount' => $item->revenue_amount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
