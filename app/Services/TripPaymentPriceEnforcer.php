<?php
namespace App\Services;

use App\Models\Payment;

class TripPaymentPriceEnforcer
{

    public $trip;
    public $customer;
    public $discount;
    public $payment_amount;


    public function __construct($trip, $customer, $discount, $payment_amount)
    {
        $this->trip = $trip;
        $this->customer = $customer;
        $this->discount = $discount;
        $this->payment_amount = $payment_amount;

    }

  
    public function execute()
    {
        $existingPaymentsTotal = $this->previouslyPaidAmountForTheTrip($this->customer, $this->trip);
        $existingDiscountsTotal = $this->previouslyGivenDiscountForTheTrip($this->customer, $this->trip);

        if (($existingPaymentsTotal + $this->payment_amount) > ($this->trip->price - $existingDiscountsTotal)) {
            throw new \Exception('Total amount exceeds the trip price');
        }

        return true;
    }


    protected function previouslyPaidAmountForTheTrip($customer, $trip)
    {
        if (is_null($customer) || is_null($trip)) {
            throw new \Exception('Customer or Trip not found');
        }

        return Payment::where('customer_id', $customer->id)
                      ->where('trip_id', $trip->id)
                      ->sum('amount');
    }

    protected function previouslyGivenDiscountForTheTrip($customer, $trip)
    {
        if (is_null($customer) || is_null($trip)) {
            throw new \Exception('Customer or Trip not found');
        }

        return Payment::where('customer_id', $customer->id)
                      ->where('trip_id', $trip->id)
                      ->sum('discount');
    }






}
