<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ViaCepService
{
    public static function search(string $zipCode): ?array
    {
        $zipCode = preg_replace('/[^0-9]/', '', $zipCode);

        if (strlen($zipCode) !== 8) {
            return null;
        }

        $response = Http::get("https://viacep.com.br/ws/{$zipCode}/json/");

        if ($response->failed() || isset($response->json()['erro'])) {
            return null;
        }

        return $response->json();
    }
}
