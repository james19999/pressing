<?php
namespace App\Ripository;

use App\Models\Customer;

class CustumerRipository {

    public function get_all_custumer(){
        return Customer::all();
    }
}
