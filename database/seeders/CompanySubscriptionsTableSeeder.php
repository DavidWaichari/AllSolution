<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Subscription;

class CompanySubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get companies and subscriptions
        $companyA = Company::firstOrCreate([
            'email' => 'companya@example.com'
        ], [
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
        ]);

        $payroll = Subscription::firstOrCreate(['name' => 'payroll']);
        $hr = Subscription::firstOrCreate(['name' => 'hr']);
        $timetrax = Subscription::firstOrCreate(['name' => 'timetrax']);

        // Attach subscriptions to the company
        $companyA->subscriptions()->sync([$payroll->id, $hr->id, $timetrax->id]);
    }
}
