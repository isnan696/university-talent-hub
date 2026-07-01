<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    public function run(): void
    {
        $merchId = \App\Models\RewardCategory::where('name', 'Merchandise')->first()?->id;
        $voucherId = \App\Models\RewardCategory::where('name', 'Voucher')->first()?->id;

        if ($merchId) {
            Reward::create([
                'category_id' => $merchId,
                'title' => 'T Shirt Eksklusif',
                'description' => 'Kaos eksklusif University Talent Hub.',
                'required_points' => 50,
                'stock' => 20,
                'status' => 'active',
            ]);
        }

        if ($voucherId) {
            Reward::create([
                'category_id' => $voucherId,
                'title' => 'Voucher GoFood 20K',
                'description' => 'Voucher GoFood senilai Rp20.000.',
                'required_points' => 30,
                'stock' => 50,
                'status' => 'active',
            ]);

            Reward::create([
                'category_id' => $voucherId,
                'title' => 'Voucher Tokopedia 50K',
                'description' => 'Voucher Tokopedia senilai Rp50.000.',
                'required_points' => 100,
                'stock' => 25,
                'status' => 'active',
            ]);
        }
    }
}
