<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Models\Trip;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\InvoiceNumberGenerator;
use App\Services\TripPaymentPriceEnforcer;

class PaymentStoreController extends Controller
{

    public function __invoke(Trip $trip, Customer $customer, PaymentStoreRequest $request)
    {
        
        try {
            (new TripPaymentPriceEnforcer($trip, $customer, $request->discount, $request->amount))->execute();

            Payment::create([
                'amount' => $request->amount,
                'customer_id' => $customer->id,
                'trip_id' => $trip->id,
                'payment_method' => $request->payment_method,
                'invoice_number' =>  (new InvoiceNumberGenerator())->generateInvoiceNumber(),
                'payment_date' => now(),
                'discount' => $request->discount,
                'reason' => $request->reason,
            ]);

            return response()->json([
                'message' => 'Payment has been made successfully'
            ], 201);


        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        
    }
}
