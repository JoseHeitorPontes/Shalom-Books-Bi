<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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

    public function messages()
    {
        return [
            'name.string' => 'O nome deve ser uma string',
            'name.required' => 'O nome é obrigatório',
            'email.string' => 'O email deve ser uma string',
            'email.required' => 'O email é obrigatório',
            'phone.string' => 'O telefone deve ser uma string',
            'phone.required' => 'O telefone é obrigatório',
            'identifier.string' => 'O cpf deve ser uma string',
            'identifier.required' => 'O cpf é obrigatório',
            'birthdate.date' => 'A data deve ser uma data válida',
            'birthdate.required' => 'O data é obrigatória',
            'gender.enum' => 'O gênero deve ser um caso válido',
            'gender.required' => 'O gênero é obrigatório',
        ];
    }
}
