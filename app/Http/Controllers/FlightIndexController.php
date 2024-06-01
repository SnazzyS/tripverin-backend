<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightIndexController extends Controller
{
    
    public function __invoke()
    {
        // $flight = Flight::with('customers')->get();
        $flight = Flight::with(['customers:id,flight_id,name'])->select('id', 'name')->get();


        return response()->json($flight);
    }
}
