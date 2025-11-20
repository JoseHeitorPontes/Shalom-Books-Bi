<?php

declare(strict_types=1);

enum Gender: string {
    case Male = 'M';
    case Female = 'F';
    case Other = 'O';

    public function messages(): string
    {
        return match ($this) {
            Gender::Male => 'Masculino',
            Gender::Female => 'Feminino',
            Gender::Other => 'Outro',
        };
    }
}
