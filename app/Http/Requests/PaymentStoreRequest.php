<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric',
            // 'customer_id' => 'required|exists:customers,id',
            // 'trip_id' => 'required|exists:trips,id',
            'payment_method' => 'required',
            // 'invoice_number' => 'required',
            // 'payment_date' => 'required|date',
            'discount' => 'nullable|numeric',
            'reason' => 'string',
        ];
    }
}
