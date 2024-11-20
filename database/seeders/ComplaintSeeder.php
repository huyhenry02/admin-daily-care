<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Seeder;
use App\Models\MarketOrderDetail;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/complaints.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Complaint::create([
                'id' => $item->id,
                'order_id' => $item->order_id,
                'complaint_by_id' => $item->complaint_by_id,
                'description' => $item->description,
                'evidence' => $item->evidence,
                'status' => $item->status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
