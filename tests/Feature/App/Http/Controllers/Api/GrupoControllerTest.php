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
   /* public function testStore()
    {
        $requestMock = Mockery::mock(GrupoRequest::class)->makePartial();
        $requestMock->shouldReceive('all')
            ->andReturn(['includes' => ['nome', 'GrupoTest']]);
        $grupoMock = $this->createMock(Grupo::class);
        $requestMock = $this->createMock(GrupoRequest::class);
        $controller = new GrupoController($grupoMock);
        $response = $controller->store($requestMock);
       return  $this->assertEquals(201, $response->getStatusCode());
    }
   */

    public function testStore_should_return_403()
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

   /* public function testUpdate_should_return_403()
    {

        $requestMock = Mockery::mock(GrupoRequest::class)->makePartial();
        $requestMock->shouldReceive('all')
            ->andReturn(['includes' => ['nome', 'GrupoTest']]);
        $grupoMock = $this->createMock(Grupo::class);
        $requestMock = $this->createMock(GrupoRequest::class);
        $controller = new GrupoController($grupoMock);

        $grupoMock->shouldReceive('all')
        ->andReturn(['includes' => ['nome', 'GrupoAtual']]);


        $response = $controller->update($requestMock,$grupoMock);
        return  $this->assertEquals(403, $response->getStatusCode());
    }*/


    public function testIndex_should_return_403()
    {

        $requestMock = Mockery::mock(GrupoRequest::class)->makePartial();
        $requestMock->shouldReceive('all')
            ->andReturn(['includes' => ['nome', 'GrupoTest']]);
        $grupoMock = $this->createMock(Grupo::class);
        $requestMock = $this->createMock(GrupoRequest::class);
        $controller = new GrupoController($grupoMock);
        $response = $controller->index($requestMock);
        return  $this->assertEquals(403, $response->getStatusCode());
    }




}


