<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GrupoRequest;
use App\Http\Resources\GrupoResource;
use App\Models\Grupo;
use App\Services\GrupoServices;

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
        $grupoServices = new GrupoServices();
        $grupos = $grupoServices->index();
        return GrupoResource::collection($grupos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GrupoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoRequest $request)
    {

        $grupoServices = new GrupoServices();
        $grupo = $grupoServices->store($request->validated());
        return new GrupoResource($grupo);
    }

    public function show(Grupo $grupo)
    {
        return new GrupoResource($grupo);
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
        $grupoServices = new GrupoServices();
        $updated = $grupoServices->update($request->validated(), $grupo);

        if ($updated) {
            return new GrupoResource($grupo);
        }
        return response()->json([], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        $grupoServices = new GrupoServices();
        $grupoServices->destroy($grupo);

        return response()->json("DELETED", 204);
    }
}
