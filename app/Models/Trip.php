<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    protected $fillable =  [
        'name',
        'price',
        'departure_date'
    ];
    
    public function setDepartureDateAttribute($value)
    {
        $this->attributes['departure_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

}
