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



     /**
     * @OA\Get(
     *     tags={"Grupo"},
     *     summary="listar grupos",
     *     description="This endpoint returns all grupos data",
     *     path="/api/grupo",
     *     security={ {"bearerToken":{}} },
     *     @OA\Response(
     *          response=200,
     *          description="grupos",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="string", example="5"),
     *              @OA\Property(property="name", type="string", example="Grupo1"),
     *            )
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Unauthenticated"),
     *          )
     *     ),
     *     @OA\Response(
     *          response=422,
     *          description="Incorrect fields",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The name has already been taken. (and 2 more errors)"),
     *              @OA\Property(property="errors", type="string", example="..."),
     *          )
     *      )
     * ),
     */
    public function index()
    {
        $grupoServices = new GrupoServices();
        $grupos = $grupoServices->index();
        return GrupoResource::collection($grupos);
    }

    /**
     * @OA\POST(
     *  tags={"Grupo"},
     *  summary="Criar um novo grupo",
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
     * @OA\PATCH(
     *  tags={"Grupo"},
     *  summary="Muda o nome do Grupo",
     *  description="esse endpoint muda o nome do grupo",
     *  path="/api/grupo/{id}",
     *  security={ {"bearerToken":{}} },
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(
     *             required={"nome"},
     *             @OA\Property(property="nome", type="string", example="Grupo III"),
     *          )
     *      ),
     *  ),
     *  @OA\Response(
     *    response=200,
     *    description="User e-mail updated successfully!",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="User e-mail updated successfully!"),
     *       @OA\Property(property="user", type="string", example="..."),
     *    )
     *  ),
     *  @OA\Response(
     *    response=401,
     *    description="Unauthenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthenticated"),
     *    )
     *  ),
     *  @OA\Response(
     *      response=422,
     *      description="Incorrect fields",
     *      @OA\JsonContent(
     *         @OA\Property(property="message", type="string", example="The name has already been taken. (and 2 more errors)"),
     *         @OA\Property(property="errors", type="string", example="..."),
     *      )
     *   )
     * )
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
     * @OA\DELETE(
     *  tags={"Grupo"},
     *  summary="Remove Grupo",
     *  description="Esse Endpoint remove um grupo.",
     *  path="/api/grupo/{id}",
     *  security={ {"bearerToken":{}} },
     *  @OA\Response(
     *    response=200,
     *    description="Remove um grupo",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Grupo removido com sucesso !")
     *    )
     *  ),
     *  @OA\Response(
     *    response=401,
     *    description="Unauthenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthenticated"),
     *    )
     *  ),
     *  @OA\Response(
     *    response=422,
     *    description="Incorrect fields",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="nome do gtru po é obrigatório."),
     *       @OA\Property(property="errors", type="string", example="..."),
     *    )
     *  )
     * )
     */
    public function destroy(Grupo $grupo)
    {
        $grupoServices = new GrupoServices();
        $grupoServices->destroy($grupo);

        return response()->json("DELETED", 204);
    }
}
