<?php

namespace Tests\Unit\App\Http\Controllers\Api;

use App\Http\Controllers\Api\GrupoController;

use App\Models\Grupo;
use App\Http\Requests\Api\GrupoRequest;
use Illuminate\Http\Request;
use Mockery;
use Tests\TestCase;

class GrupoControllerTest extends TestCase
{


    /* public function testStore_should_return_403()
    {

        $requestMock = Mockery::mock(GrupoRequest::class)->makePartial();
        $requestMock->shouldReceive('all')
            ->andReturn(['includes' => ['nome', 'GrupoTest']]);


        $grupoMock = $this->createMock(Grupo::class);
        $requestMock = $this->createMock(GrupoRequest::class);
        $controller = new GrupoController($grupoMock);
        $response = $controller->store($requestMock);
       return  $this->assertEquals(403, $response->getStatusCode());
    }
*/


    /**
     * Testa o método index do GrupoController.
     *
     * @return void
     */
    public function testIndex()
    {
        //Grupo::factory()->create();
        $token = "1|e5bItJkTZfV2cX8M0mT1CjkPhWHIAwIT4pMLhWGc6b97444b";
        $response = $this->get(
            '/api/grupoTest',
            [
                'headers' => [
                    'Authorization' => 'Bearer' . $token,
                    'Accept' => 'application/json'
                ]
            ]

        );
        $response->assertStatus(403);
    }


    /**
     * Testa o método store do GrupoController.
     *
     * @return void
     */
  /*  public function testStore()
    {

        $token = "1|e5bItJkTZfV2cX8M0mT1CjkPhWHIAwIT4pMLhWGc6b97444b";
        $data = [
            'nome' => 'Grupo de Teste',
            [
                'headers' => [
                    'Authorization' => 'Bearer' . $token,
                    'Accept' => 'application/json'
                ]
            ]
        ];
        $response = $this->post('/api/grupoTest', $data);
        $response->assertStatus(200);
        $response->assertJson([
            'nome' => 'Grupo de Teste',

        ]);
    }*/
}
