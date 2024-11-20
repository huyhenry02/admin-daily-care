<?php

namespace Database\Seeders;

use App\Models\Cleaner;
use Illuminate\Database\Seeder;

class CleanerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/cleaner.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Cleaner::create([
                'id' => $item->id,
                'user_id' => $item->user_id,
                'rating' => $item->rating,
                'point' => $item->point,
                'cv' => $item->cv,
                'temporary_residence_address' => $item->temporary_residence_address,
                'status' => $item->status,
                'can_cleaning' => $item->can_cleaning,
                'can_market' => $item->can_market,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
