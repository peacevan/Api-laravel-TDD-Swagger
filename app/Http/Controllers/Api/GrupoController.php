<?php
namespace App\Http\Controllers\Api;

use App\Models\Grupo;
use App\Http\Requests\Api\GrupoRequest;
use App\Http\Resources\GrupoResource;
use App\Services\GrupoServices;
use App\Http\Controllers\Controller;


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
     * @OA\POST(
     *  tags={"Grupo"},
     *  summary="Create a new Group",
     *  description="esse endpoint cria um novo grupor",
     *  path="/api/grupo",
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(
     *
     *             @OA\Property(property="name", type="string", example="Ivan Amado"),
     *
      *          )
     *      ),
     *  ),
     *  @OA\Response(
     *    response=200,
     *    description="Grupo Cliado",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="group created successfully!")
     *    )
     *  ),
     *  @OA\Response(
     *    response=422,
     *    description="Incorrect fields",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="The name has already been taken. (and 2 more errors)"),
     *       @OA\Property(property="errors", type="string", example="..."),
     *    )
     *  )
     * )
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

        if ($updated)
        {
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
