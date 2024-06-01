<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripDashboardController extends Controller
{

    public function __invoke(Trip $trip)
    {
        return response()->json($trip->load('customers'));
    }
}
