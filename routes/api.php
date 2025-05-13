<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\zipCodeController;
use Illuminate\Http\Response;

Route::fallback(function () {
  return response()->json([
    'status' => Response::HTTP_NOT_FOUND,
    'message' => 'Não encontrado.'
  ], Response::HTTP_NOT_FOUND);
});

Route::get('/', function () {
  return response()->json([
    'success' => "Laravel API CEP está funcionando",
  ]);
});

Route::get('/cep/{cep}', [zipCodeController::class, 'searchZipCode']);