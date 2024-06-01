<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Trip;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerShowController extends Controller
{
    //show individual profile, including the paid amount, balance amount

    public function __invoke(Trip $trip, Customer $customer)
    {
        return response()->json($customer->load('payment'), 201);
    }
}
