<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;


class zipCodeTest extends TestCase
{
    #[Test]
    public function valid_zip_code(): void
    {
        $zip = '06243110';
        $response = $this->get("/api/cep/{$zip}");

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'cep',
            'logradouro',
            'complemento',
            'unidade',
            'bairro',
            'localidade',
            "uf",
            "estado",
            "regiao",
            "ibge",
            "gia",
            "ddd",
            "siafi",
        ]);
    }

    #[Test]
    public function invalid_zip_code(): void
    {
        $zip = '06243';
        $response = $this->get("/api/cep/{$zip}");

        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonStructure([
            'error',
        ]);
    }

    #[Test]
    public function not_found_zip_code(): void
    {
        $zip = '11111111';
        $response = $this->get("/api/cep/{$zip}");

        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJsonStructure([
            'error',
        ]);
    }
}
