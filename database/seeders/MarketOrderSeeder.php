<?php

namespace Database\Seeders;

use App\Models\MarketOrder;
use Illuminate\Database\Seeder;

class MarketOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/market_order.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            MarketOrder::create([
                'id' => $item->id,
                'order_id' => $item->order_id,
                'from_name_customer' => $item->from_name_customer,
                'from_phone_customer' => $item->from_phone_customer,
                'from_home_type' => $item->from_home_type,
                'from_address' => $item->from_address,
                'to_name_customer' => $item->to_name_customer,
                'to_phone_customer' => $item->to_phone_customer,
                'to_home_type' => $item->to_home_type,
                'to_address' => $item->to_address,
                'deposit_price' => $item->deposit_price,
                'service_price' => $item->service_price,
                'expect_price' => $item->expect_price,
                'bought_price' => $item->bought_price,
                'status' => $item->status,
                'delivery_time' => $item->delivery_time,
                'note' => $item->note,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}