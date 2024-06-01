<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerStoreRequest;

class CustomerUpdateController extends Controller
{
    public function __invoke(Trip $trip, Customer $customer, Request $request)
    {
        // $data = $customer->fill($request->all());

        // $dataArray = ($data->toArray());

        // $customerStoreRequest = new CustomerStoreRequest();

        // $customerStoreRequest->validate($dataArray, $customerStoreRequest->rules());

        dd('here');

    }
}
