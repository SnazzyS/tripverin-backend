<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\CustomerTravellerIDGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_number',
        'phone_number',
        'traveller_id',
        'trip_id'
        
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            $customer->traveller_id = (new CustomerTravellerIDGenerator())->generateTravellerID($customer->trip_id);
        });
    
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
