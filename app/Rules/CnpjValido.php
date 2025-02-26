<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CnpjValido implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cnpj = preg_replace('/\D/', '', $value);

        if (strlen($cnpj) !== 14 || $this->isInvalidCnpj($cnpj)) {
            $fail('O CNPJ informado é inválido.');
        }
    }

    private function isInvalidCnpj($cnpj): bool
    {
        $weights1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $weights2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        $firstDigit = $this->calculateDigit($cnpj, $weights1);
        $secondDigit = $this->calculateDigit($cnpj, $weights2);

        return ($firstDigit != $cnpj[12] || $secondDigit != $cnpj[13]);
    }

    private function calculateDigit($cnpj, $weights): int
    {
        $sum = 0;
        for ($i = 0; $i < count($weights); $i++) {
            $sum += $cnpj[$i] * $weights[$i];
        }
        $remainder = $sum % 11;
        return ($remainder < 2) ? 0 : 11 - $remainder;
    }
}
