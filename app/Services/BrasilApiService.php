<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BrasilApiService
{
    public static function searchCnpj(string $cnpj): ?array
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        if (strlen($cnpj) !== 14) {
            return null;
        }

        $response = Http::get("https://brasilapi.com.br/api/cnpj/v1/{$cnpj}");

        if ($response->failed()) {
            return null;
        }

        return $response->json();
    }
}
