<?php

namespace Tests\Feature\App\Http\Controllers\Api;
use App\Http\Controllers\Api\GrupoController;
use App\Models\Grupo;
use App\Models\User;
use Tests\TestCase;

class GrupoControllerTest extends TestCase
{
    /**
     * Testa o método index do GrupoController.
     *
     * @return void
     */
    public $idGrupoCreated;
    public function test_index()
    {
        $user = User::find(1);
        $this->assertCount(1, $user->tokens);
        $this->actingAs($user);
        $response = $this->get('/api/grupo');
        $response->assertStatus(200);
    }

    /**
     * Testa o método store do GrupoController.
     *
     * @return void
     */
    public function test_store()
    {
        $user = User::find(1);
        $this->assertCount(1, $user->tokens);
        $this->actingAs($user);

        $data = ["nome" => 'Grupo de Teste'];
        $response = $this->json("post", "/api/grupo", $data);
         $response->assertStatus(201);
        $this->idGrupoCreated=$response->json('data.id');
        $this->assertEquals("Grupo de Teste", $response->json('data.nome'));
        $this->assertEquals($this->idGrupoCreated, $response->json('data.id'));
        $this->idGrupoCreated=5;
    }

    /**
     * Testa o método store do GrupoController.
     *
     * @return void
     */
    public function test_update()
    {
        $user = User::find(1);
        $this->assertCount(1, $user->tokens);
        $this->actingAs($user);
        $grupo = Grupo::find(3);
        $grupo =Grupo::latest()->get();
        $idGrupo=json_decode($grupo)[0]->id;
        $data = [
            "id" =>  $idGrupo,
            "nome" => 'Grupo de Teste',
        ];
       if ($idGrupo){
        $data = ["nome" => 'Grupo Updated'];
        $response = $this->json("put", "/api/grupo/ $idGrupo", $data);
        $response->assertStatus(200);
        $this->assertEquals("Grupo Updated", $response->json('data.nome'));
       }
    }

     /**
     * Testa o método delte do GrupoController.
     *
     * @return void
     */
    public function teste_delete()
    {
        $user = User::find(1);
        $this->assertCount(1, $user->tokens);
        $this->actingAs($user);
        $grupo =Grupo::latest()->get();
        $idGrupo=json_decode($grupo)[0]->id;
        if ($idGrupo) {
            $response = $this->json("DELETE", "/api/grupo/ $idGrupo");
            $response->assertStatus(200);
            $grupo = Grupo::find($idGrupo);
            $this->assertEquals(Null,$grupo);
            $this->assertEquals("success", $response->json('status'));
        } else {
            $this->assertTrue(true);
        }
    }
}
