<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::firstOrCreate(
            ['email' => 'companya@example.com'], // check if a record with this email exists
            [
                'name' => 'Company A',
                'branch' => 'Branch A',
                'country' => 'Country A',
                'city' => 'City A',
                'default_currency' => 'USD',
                'telephone_number' => '123456789',
                'mobile_number' => '987654321',
                'address' => '123 Main Street',
                'registration_number' => '123456',
                'kra_pin' => 'KRA123',
                'nssf_no' => 'NSSF123',
                'nhif_no' => 'NHIF123',
                'status' => 'active',
                'extras' => json_encode([]),
            ]
        );

        // Add more companies as needed
    }
}
