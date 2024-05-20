<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ContactInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@plm.edu.ph',
            'password' => Hash::make('admin'),
            'SNum' => '201900001',
            'ContactNum' => '09123456789',
            'TelNum' => '1234567',
            'Address' => '123 Admin St.',
            'Country' => 'Philippines',
            'City' => 'Manila',
            'Province' => 'Metro Manila',
            'Region' => 'NCR',
            'PostalCode' => '1000',
            'Linkedin' => 'https://linkedin.com/in/admin',
        ]);

        ContactInfo::create([
            'user_id' => $admin->id,
            'email' => $admin->email,
            'telephone_number' => $admin->TelNum,
            'cellphone_number' => $admin->ContactNum,
            'home_address' => $admin->Address,
            'country' => $admin->Country,
            'city' => $admin->City,
            'province' => $admin->Province,
            'region' => $admin->Region,
            'postal_code' => $admin->PostalCode,
            'linkedin_account_link' => $admin->Linkedin,
        ]);

        // Create other users and their contact info
        User::factory()
            ->count(20)
            ->create()
            ->each(function ($user) {
                ContactInfo::create([
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'telephone_number' => $user->TelNum,
                    'cellphone_number' => $user->ContactNum,
                    'home_address' => $user->Address,
                    'country' => $user->Country,
                    'city' => $user->City,
                    'province' => $user->Province,
                    'region' => $user->Region,
                    'postal_code' => $user->PostalCode,
                    'linkedin_account_link' => $user->Linkedin,
                ]);
            });
    }
}
