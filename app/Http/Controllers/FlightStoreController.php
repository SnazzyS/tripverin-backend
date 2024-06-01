<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Requests\FlightStoreRequest;

class FlightStoreController extends Controller
{
    public function __invoke(Trip $trip, FlightStoreRequest $request)
    {
        Flight::create([
            'name' => $request->name,
            'trip_id' => $trip->id
        ]);

        return response()->json([
            'message' => 'Flight created successfully'
        ], 201);
        
    }
}
