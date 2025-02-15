<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'trip_id'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
