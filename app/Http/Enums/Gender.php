<?php

declare(strict_types=1);

namespace App\Http\Enums;

enum Gender: string {
    case Male = 'M';
    case Female = 'F';
    case Other = 'O';

    public function messages(): string
    {
        return match ($this) {
            self::Male => 'Masculino',
            self::Female => 'Feminino',
            self::Other => 'Outro',
        };
    }
}
