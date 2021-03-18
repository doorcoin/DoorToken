<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    protected $fillable = [
        'parcel_number', 'address1', 'address2',
        'city', 'state', 'zip', 'area_lot_sf',
        'area_building_sf', 'num_beds', 'num_bath',
        'tax_value', 'market_value', 'year_built',
        'property_type_id'
    ];

    public function user_map()
    {
        return $this->belongsTo(PropertyUserMap::class, 'id');
    }
}
