<?php

namespace App\Http\Controllers;

// use function Spatie\LaravelPdf\Support\pdf;
use App\Models\Trip;
use App\Models\Flight;
use Barryvdh\DomPDF\Facade\Pdf;

class FlightPDFController extends Controller
{
    public function __invoke(Trip $trip, Flight $flight)
    {

        $customers = ($flight->customers()->select('name', 'id_number')->get());
        $tripName = $trip->name;
        $flightName = $flight->name;
    
        $data = [
            'title' => $tripName,
            'flight' => $flightName,
            'customers' => $customers
        ];

        $pdf = Pdf::loadView('flightList', $data);

        return $pdf->download('flight.pdf');
    }
}
