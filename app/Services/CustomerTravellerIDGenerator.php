<?php

namespace App\Services;

use App\Models\Customer;

class CustomerTravellerIDGenerator
{
    public function generateTravellerID($tripID)
    {

        $customerCount = Customer::where('trip_id', $tripID)->count();
        
        $travellerID = 'TR' . $tripID . '-' . (101 + $customerCount);

        return $travellerID;
            
    }
}
