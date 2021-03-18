<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = array(
            'Administrator',
            'Authorized Owner',
            'Authorized User',
        );

        foreach ($roles as $role) {
            UserRole::firstOrCreate([
                'type' => $role
            ]);
        }
    }
}
