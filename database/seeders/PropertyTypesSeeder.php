<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyTypes;

class PropertyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $properties = array(
            'Single Family House',
            'Condo',
            'Townhouse',
            'Duplex',
            'Commercial'
        );

        foreach ($properties as $property) {
            PropertyTypes::firstOrCreate([
                'type' => $property
            ]);
        }
    }
}
