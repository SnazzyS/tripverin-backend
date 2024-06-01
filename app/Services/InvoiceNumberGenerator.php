<?php

namespace App\Services;

use App\Models\Payment;

class InvoiceNumberGenerator
{
    public function generateInvoiceNumber()
    {
        $year = now()->year;
        $lastInvoice = Payment::whereYear('created_at', $year)->orderBy('id', 'desc')->first();
        // dd($lastInvoice);

        if ($lastInvoice) {
            $lastNumber = (int) substr($lastInvoice->invoice_number, -4);
            $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '0001';
        }

        return 'INV/' . $year . '/' . $nextNumber;
    }
}
