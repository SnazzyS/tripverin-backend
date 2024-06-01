<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerStoreRequest;
use App\Services\CustomerTravellerIDGenerator;

class CustomerStoreController extends Controller
{
    public function __invoke(Trip $trip, Customer $customer, CustomerStoreRequest $request)
    {
        Customer::create([
            'name' => $request->name,
            'id_number' => $request->id_number,
            'phone_number' => $request->phone_number,
            'trip_id' => $trip->id,
            'traveller_id' => new CustomerTravellerIDGenerator($trip->id),
            'flight_id' => null,
        ]);

        return response()->json([
            'customer' => $customer,
            'message' => 'Customer created successfully'
        ]);
    }
}
