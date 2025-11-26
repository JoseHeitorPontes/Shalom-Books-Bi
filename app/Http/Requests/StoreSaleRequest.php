<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
            'customer_id' => 'int|required|exists:customers,id',
            'total' => 'string|required',
            'payment_method' => 'string|required',
            'items' => 'array|required',
            'items.*.book_id' => 'int|required|exists:books,id',
            'items.*.quantity' => 'int|required',
        ];
    }
}
