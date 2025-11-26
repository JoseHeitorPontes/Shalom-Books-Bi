<?php

declare(strict_types=1);

namespace App\Http\Enums;

enum PaymentMethod: string {
    case Cash = 'cash';
    case Debit = 'debit';
    case Credit = 'credit';
    case Pix = 'pix';

    public function messages(): string
    {
        return match ($this) {
            self::Cash => 'Espécie',
            self::Debit => 'Débito',
            self::Credit => 'Crédito',
            self::Pix => 'Pix',
        };
    }
}
