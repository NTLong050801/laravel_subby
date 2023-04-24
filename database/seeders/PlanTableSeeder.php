<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Bpuig\Subby\Models\Plan;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $plan = Plan::create([
            'tag' => 'basic',
            'name' => '6 Month',
            'description' => 'For small businesses',
            'price' => 9.99,
            'signup_fee' => 1.99,
            'invoice_period' => 6,
            'invoice_interval' => 'month',
            'trial_period' => 1,
            'trial_interval' => 'month',
            'grace_period' => 1,
            'grace_interval' => 'day',
            'tier' => 1,
            'currency' => 'EUR',
        ]);

        Plan::create([
            'tag' => 'pro',
            'name' => '12 Month',
            'description' => 'For max businesses',
            'price' => 99.99,
            'signup_fee' => 19.99,
            'invoice_period' => 12,
            'invoice_interval' => 'month',
            'trial_period' => 1,
            'trial_interval' => 'month',
            'grace_period' => 1,
            'grace_interval' => 'day',
            'tier' => 1,
            'currency' => 'EUR',
        ]);
    }
}
