<?php

namespace Database\Seeders;

use App\Models\Cleaner;
use App\Models\CleaningOrder;
use Illuminate\Database\Seeder;

class CleanerOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/cleaning_order.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            CleaningOrder::create([
                'id' => $item->id,
                'order_id' => $item->order_id,
                'name_customer' => $item->name_customer,
                'phone_customer' => $item->phone_customer,
                'home_type' => $item->home_type,
                'address' => $item->address,
                'total_price' => $item->total_price,
                'deposit' => $item->deposit,
                'status' => $item->status,
                'start_time' => $item->start_time,
                'service_cleaning_hour_id' => $item->service_cleaning_hour_id,
                'note' => $item->note,
                'is_cleaning_other' => $item->is_cleaning_other,
                'is_cook' => $item->is_cook,
                'has_tool' => $item->has_tool,
                'has_animals' => $item->has_animals,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
