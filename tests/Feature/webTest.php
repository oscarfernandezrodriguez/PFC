<?php

namespace Tests\Feature;

use Illuminate\Database\Concerns\ManagesTransactions;
use Illuminate\Database\Eloquent\Concerns\GuardsAttributes;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\Rules\DatabaseRule;
use Tests\TestCase;

class Pruebas_BasicasTest extends TestCase
{
    use  WithFaker;
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
    /** @test */
    public function El_formulario_de_registro_se_muestra()
    {
        $response = $this->get(route('registro'));
        $response->assertStatus(200);
    }
    /** @test */
    public function La_pagina_devoluciones_se_muestra()
    {
        $response = $this->get(route('devoluciones'));
        $response->assertStatus(200);

    }
    /** @test */
    public function La_pagina_pagos_se_muestra()
    {
        $response = $this->get(route('metodos-pagos'));
        $response->assertStatus(200);
    }
    /** @test */
    public function La_pagina_envios_se_muestra()
    {
        $response = $this->get(route('tarifas-envios'));
        $response->assertStatus(200);
    }
    /** @test */
    public function La_pagina_seccion_se_muestra()
    {
        $response = $this->get('/categoria/Infantil/');
        $response->assertStatus(200);
    }
    /** @test */
    public function La_pagina_subseccion_se_muestra()
    {
        $response = $this->get('/categoria/Ortopedia/Muletas');
        $response->assertStatus(200);
    }
    /** @test */
    public function La_pagina_no_deja_guardar_wishlist_a_visitantes()
    {
        $response = $this->get('/panel-de-control/wishlist/guardar/1');
        $response->assertStatus(200);
    }
    /** @test */
    public function La_bbdd_deja_insertar_usuario_y_muestra_el_index()
    {
        $usuario = factory(\App\Usuario::class)->create();
        $response = $this->actingAs($usuario)->get(route('Principal'));
        $response->assertStatus(200);

    }

    /** @test */
    public function El_usuario_se_puede_loguear_y_es_redirigido()
    {
        $usuario = factory(\App\Usuario::class)->create();

        $response = $this->post(route('login'), [
            'email' => $usuario->email,
            'password' => 'secret'
        ]);

        $response->assertRedirect(route('Principal'));
        $this->assertAuthenticatedAs($usuario);
    }


}
