<?php

namespace Tests\Unit\App\Http\Controllers\Api;

//use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Api\GrupoController;
use App\Models\Grupo;
use Mockery;
use Tests\TestCase;
use App\Models\User;
use App\Http\Controllers\Controller;

class GrupoControllerTest extends TestCase
{

    public function test_gerente_level_two_should_create_grupo(){
      $controller= new Controller();
      $user = User::find(1); //usuario id 1 nível 2
      $this->actingAs($user);
      $res= $controller->allowsPermission('can-maneger-groups');
      $this->assertTrue($res);
    }

    public function test_gerente_level_one_dont_can_create_grupo(){
        $controller= new Controller();
        $user = User::find(2);
        $this->actingAs($user);
        $res= $controller->allowsPermission('can-maneger-groups');
        $this->assertFalse($res);
      }



    public function test_gerente_level_one_can_add_remove_client(){
        $controller= new Controller();
        $user = User::find(2);
        $this->actingAs($user);
        $res= $controller->allowsPermission('can-add-remove-client');
        $this->assertTrue($res);
      }


    public function test_gerente_level_two_dont_can_add_remove_client(){
        $controller= new Controller();
        $user = User::find(1);
        $this->actingAs($user);
        $res= $controller->allowsPermission('can-add-remove-client');
        $this->assertFalse($res);
      }


      public function test_gerente_level_one_can_view_group(){
        $controller= new Controller();
        $user = User::find(2);
        $this->actingAs($user);
        $res= $controller->allowsPermission('can-viewer-groups');
        $this->assertTrue($res);
      }

}
