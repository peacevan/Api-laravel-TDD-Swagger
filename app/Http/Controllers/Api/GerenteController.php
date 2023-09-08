<?php

namespace App\Http\Controllers\Api;

use App\Models\Gerente;
use App\Http\Requests\GerenteRequest;
use App\Http\Resources\GerenteResource;
use App\Services\GerenteServices;
use App\Http\Controllers\Controller;



class GerenteController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $gerenteServices = new GerenteServices();
        $gerentes = $gerenteServices->initialize();

        return GerenteResource::collection($gerentes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gerenteServices = new GerenteServices();
        $gerentes = $gerenteServices->index();

        return GerenteResource::collection($gerentes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GerenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GerenteRequest $request)
    {
        $gerenteServices = new GerenteServices();
        $gerente = $gerenteServices->store($request->validated());

        return new GerenteResource($gerente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gerente  $gerente
     * @return \Illuminate\Http\Response
     */
    public function show(Gerente $gerente)
    {
        return new GerenteResource($gerente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GerenteRequest  $request
     * @param  \App\Models\Gerente  $gerente
     * @return \Illuminate\Http\Response
     */
    public function update(GerenteRequest $request, Gerente $gerente)
    {
        $gerenteServices = new GerenteServices();
        $updated = $gerenteServices->update($request->validated(), $gerente);

        if ($updated)
        {
            return new GerenteResource($gerente);
        }
        return response()->json([], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gerente  $gerente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gerente $gerente)
    {
        $gerenteServices = new GerenteServices();
        $gerenteServices->destroy($gerente);

        return response()->json("DELETED", 204);
    }
}
