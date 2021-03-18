<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Lists;

class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lists = array(
            'Looking for Real Estate Agent',
            'Looking for Mortgage',
            'Looking for Insurance',
            'Looking for Home Repair',
            'Looking for Home Improvement',
            'Looking for Home Products',
            'Looking for Home Utilities',
            'Looking for Home Care',
        );

        foreach ($lists as $list) {
            Lists::firstOrCreate([
                'list' => $list,
                'description' => ''
            ]);
        }
    }
}
