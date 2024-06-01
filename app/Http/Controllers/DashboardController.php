<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __invoke()
    {
        return response()->json(Trip::withCount('customers')->get());
    }
    // this is where after login, user will be
    // show all trip details, edit trips, create trips should be here
    // there has to be a search feature here allowing to search customers by ID or name
}
