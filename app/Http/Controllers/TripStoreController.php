<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Requests\TripStoreRequest;

class TripStoreController extends Controller
{
    public function __invoke(TripStoreRequest $request)
    {
        $trip = Trip::create($request->validated());

        return response()->json([
            'message' => 'Trip has been created successfully',
            'data' => $trip
        ], 201);
    }
}
