<?php

namespace Database\Seeders;

use App\Models\RewardCategory;
use Illuminate\Database\Seeder;

class RewardCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Merchandise', 'Voucher', 'Sertifikat', 'Beasiswa', 'Workshop'];

        foreach ($categories as $name) {
            RewardCategory::create(['name' => $name]);
        }
    }
}
