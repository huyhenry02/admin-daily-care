<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/orders.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Order::create([
                'id' => $item->id,
                'customer_id' => $item->customer_id,
                'cleaner_id' => $item->cleaner_id,
                'service_type' => $item->service_type,
                'status' => $item->status,
                'pay_status' => $item->pay_status,
                'feedback' => $item->feedback,
                'rating' => $item->rating,
                'old_order_id' => $item->old_order_id,
                'feedback_date' => $item->feedback_date,
                'number_of_repetition' => $item->number_of_repetition,
                'is_required' => $item->is_required,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
