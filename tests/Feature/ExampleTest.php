<?php

namespace Tests\Feature;
use App\Http\Requests\Api\ClienteRequest;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /*public function test_the_application_returns_a_successful_response()
    {
        $response =  $this->get('api/cliente');
        $response->assertStatus(200);
    }*/


    function can_store_cliente(ClienteRequest $request)
    {

      return  $this->post('api/clienteTest', ['nome' => 'Ivan Amado '])
        ->seeJson([
            'created' => false,
        ]);


    }
}
