<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the first company from the database
        $firstCompany = Company::first();

        // Define user data
        $usersData = [
            [
                'name' => 'Developer',
                'email' => 'devs@wizag.biz',
                'password' => bcrypt('1234'),
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'password' => bcrypt('1234'),
            ],
            // Add more users as needed
        ];

        foreach ($usersData as $userData) {
            // Check if the user already exists with the provided email
            $user = User::where('email', $userData['email'])->first();

            // If the user does not exist, create a new user
            if (!$user) {
                $user = User::create($userData);
            }

            // Attach the first company to the user using the pivot table
            $user->companies()->syncWithoutDetaching([$firstCompany->id]);
        }
    }
}
