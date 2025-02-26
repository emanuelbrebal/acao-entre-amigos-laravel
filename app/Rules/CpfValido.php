<?php

namespace App\Rules;

use Illuminate\Validation\Rule;

class CpfValido implements Rule
{
    public function passes($attribute, $value)
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/\D/', '', $value);

        // Verifica se tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se todos os dígitos são iguais (ex: 000.000.000-00)
        if (preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        // Cálculo do primeiro dígito verificador
        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'O CPF informado não é válido.';
    }
}
