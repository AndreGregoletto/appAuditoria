<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('cpf', function ($attribute, $value, $parameters, $validator) {
            $value = preg_replace('/[^0-9]/', '', $value);
            if (strlen($value) != 11 || preg_match('/(\d)\1{10}/', $value)) {
                return false;
            }
    
            // Calcula os dígitos verificadores
            for ($t = 9; $t < 11; $t++) {
                $d = 0;
                for ($c = 0; $c < $t; $c++) {
                    $d += $value[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($value[$c] != $d) {
                    return false;
                }
            }
            return true;
        }, 'O CPF informado é inválido.');
    }
}
