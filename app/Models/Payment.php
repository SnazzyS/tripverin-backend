<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable =  [
        'amount',
        'customer_id',
        'trip_id',
        'payment_method',
        'invoice_number',
        'payment_date',
        'discount',
        'reason',
        
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
