<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GrupoRequest;
use App\Http\Resources\GrupoResource;
use App\Models\Grupo;
use App\Services\GrupoServices;
use Exception;

class GrupoController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {

        $grupoServices = new GrupoServices();
        $grupos = $grupoServices->initialize();
        return GrupoResource::collection($grupos);
    }

    public function index()
    {
        try {
            if (!$this->allowsPermission("can-viewer-groups")) {
                return response()->json("Acess Denied", 403);
            }

            $grupoServices = new GrupoServices();
            $grupos = $grupoServices->index();
            return GrupoResource::collection($grupos);
        } catch (Exception $e) {
            return response()->json(["status" => "fail", "message" => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GrupoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoRequest $request)
    {

        try {
            if (!$this->allowsPermission("can-maneger-groups")) {
                return response()->json("Acess Denied", 403);
            }

            $grupoServices = new GrupoServices();
            $grupo = $grupoServices->store($request->validated());
            return new GrupoResource($grupo);
        } catch (Exception $e) {
            return response()->json(["status" => "fail", "message" => $e->getMessage()], 500);
        }
    }

    public function show(Grupo $grupo)
    {
        try {
            if (!$this->allowsPermission("can-viewer-groups")) {
            return response()->json("Acess Denied", 403);
            }
            return new GrupoResource($grupo);
        } catch (Exception $e) {
            return response()->json(["status" => "fail", "message" => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GrupoRequest  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoRequest $request, Grupo $grupo)
    {
        try {
            if (!$this->allowsPermission("can-maneger-groups")) {
                return response()->json("Acess Denied", 403);
            }

            $grupoServices = new GrupoServices();
            $updated = $grupoServices->update($request->validated(), $grupo);

            if ($updated) {
                return new GrupoResource($grupo);
            }
            return response()->json([],201);
        } catch (Exception $e) {
            return response()->json(["status" => "fail", "message" => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        try {
            if (!$this->allowsPermission("can-maneger-groups")) {
                return response()->json("Acess Denied", 403);
            }
            $grupoServices = new GrupoServices();
            $grupoServices->destroy($grupo);
            return ['message' => 'Grupo excluído com sucesso !', 'status' => 'success'];
        } catch (Exception $e) {
            return response()->json(["status" => "fail", "message" => $e->getMessage()], 500);
        }
    }

}
