<?php

namespace Database\Seeders;

use App\Models\MarketOrder;
use Illuminate\Database\Seeder;
use App\Models\MarketOrderDetail;

class MarketOrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/market_order_details.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            MarketOrderDetail::create([
                'id' => $item->id,
                'market_order_id' => $item->market_order_id,
                'name_product' => $item->name_product,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
