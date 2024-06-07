<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscription;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscription::firstOrCreate(
            ['name' => 'payroll'],
            [
                'name' => 'payroll',
                'path' => '/payroll',
                'status' => 'active',
                'extras' => json_encode([]),
            ]
        );

        Subscription::firstOrCreate(
            ['name' => 'hr'],
            [
                'name' => 'hr',
                'path' => '/hr',
                'status' => 'active',
                'extras' => json_encode([]),
            ]
        );

        Subscription::firstOrCreate(
            ['name' => 'timetrax'],
            [
                'name' => 'timetrax',
                'path' => '/timetrax',
                'status' => 'active',
                'extras' => json_encode([]),
            ]
        );
    }
}
