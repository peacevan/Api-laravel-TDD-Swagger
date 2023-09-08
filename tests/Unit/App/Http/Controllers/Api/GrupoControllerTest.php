<?php

namespace Tests\Unit\App\Http\Controllers\Api;
use App\Http\Controllers\Api\GrupoController;

use App\Models\Grupo;
use App\Http\Requests\Api\GrupoRequest;
use Illuminate\Http\Request;
use Mockery;
use PHPUnit\Framework\TestCase;

class GrupoControllerTest extends TestCase
{


  /*  public function testExemploComDadosFicticios()
    {
        $request = $this->getMockBuilder(GrupoRequest::class)
            ->disableOriginalConstructor()
            ->getMock();
       $request->method('input')->willReturnMap([
            ['nome', 'NomeFicticio'],
        ]);
        $this->assertTrue($request->authorize());
        $expectedRules = [
            'nome' => ['required'],
        ];
        $this->assertEquals($expectedRules, $request->rules());
    }*/

 /*   public function testNomeIsRequired()
    {
        $request = $this->getMockBuilder(GrupoRequest::class)
            ->disableOriginalConstructor()
            ->getMock();
        $nome[1]='ivan';
        $request->expects($this->once())
            ->method('input')
            ->with('nome')
            ->willReturn($nome[1]);

        $this->assertFalse($request->authorize());
       // $this->assertEquals(['nome' => ['required']], $request->rules());
    }
  */

    public function testStore()
    {
        $requestMock = new GrupoRequest();
        $requestData = ['nome' => 'GrupoTest'];
        request()->merge($requestData);
        $grupoMock = $this->createMock(Grupo::class);
        $controller = new GrupoController($grupoMock);
        $response = $controller->store($requestMock);
        $this->assertEquals(201, $response->getStatusCode());
    }

  /*  public function testIndex()
    {

        $grupoMock = $this->createMock(Grupo::class);
        $grupoMock->method('all')->willReturn([]);
        $controller = new GrupoController($grupoMock);
        $response = $controller->index();
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
    }*/

  /*  public function testUpdate()
    {

        $requestMock = $this->createMock(Request::class);
        $requestMock->method('all')->willReturn([]);


        $grupoMock = $this->createMock(Grupo::class);
        $grupoMock->method('update')->willReturn(true);

        $controller = new GrupoController($grupoMock);
        $response = $controller->update($requestMock, 1);

        $this->assertEquals(302, $response->getStatusCode());
    }*/
}


