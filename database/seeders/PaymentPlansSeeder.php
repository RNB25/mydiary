<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::create([
            'name' => 'Trial',
            'price' => 0,
            'duration_in_days' => 17,
            'features' => 'Akses terbatas selama masa trial',
        ]);

        SubscriptionPlan::create([
            'name' => 'Premium',
            'price' => 20000, // contoh harga Rp 20.000
            'duration_in_days' => 28,
            'features' => 'Akses penuh semua fitur, backup data, prioritas support',
        ]);
    }
}
