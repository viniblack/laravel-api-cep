<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class zipCodeController extends Controller
{
    public function searchZipCode($cep)
    {
        $cep = preg_replace('/[^0-9]/', '', $cep);

        if (strlen($cep) !== 8) {
            return response()->json(['error' => 'CEP inválido'], Response::HTTP_BAD_REQUEST);
        }

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->failed() || $response->json('erro')) {
            return response()->json(['error' => 'CEP não encontrado'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($response->json(), Response::HTTP_OK);
    }
}
