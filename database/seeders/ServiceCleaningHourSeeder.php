<?php

namespace Database\Seeders;

use App\Models\MarketOrder;
use Illuminate\Database\Seeder;
use App\Models\ServiceCleaningHour;

class ServiceCleaningHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/service_cleaning_hour.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            ServiceCleaningHour::create([
                'id' => $item->id,
                'name' => $item->name,
                'hour' => $item->hour,
                'price' => $item->price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
