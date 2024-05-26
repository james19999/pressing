<?php
namespace App\Ripository;

use App\Models\Garment;

class GarmentRipository {

    public function get_all_Garment(){
        return Garment::all();
    }
}
