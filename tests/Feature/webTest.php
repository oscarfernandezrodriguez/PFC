<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Pruebas_BasicasTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function El_Index_se_muestra()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test */
    public function El_formulario_de_login_se_muestra()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertViewIs('login');
    }

}
