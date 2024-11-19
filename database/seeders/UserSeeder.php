<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\ServiceCleaningHour;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/users.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            User::create([
                'id' => $item->id,
                'name' => $item->name,
                'user_name' => $item->user_name,
                'email' => $item->email,
                'password' => bcrypt($item->password),
                'phone_number' => $item->phone_number,
                'address' => $item->address,
                'identification' => $item->identification,
                'role_type' => $item->role_type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
