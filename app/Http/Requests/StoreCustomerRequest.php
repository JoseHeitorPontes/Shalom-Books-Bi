<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'string|required',
            'email' => 'string|required',
            'phone' => 'string|required',
            'identifier' => 'string|required',
            'birthdate' => 'date|required',
            'gender' => [
                'required',
                new Enum(Gender::class),
            ],
        ];
    }
}
