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
     * @OA\Get(
     *     tags={"Gerente"},
     *     summary="listar Gerentes",
     *     description="Retorna todos os Gerentes",
     *     path="/api/gerente",
     *     security={ {"bearerToken":{}} },
     *     @OA\Response(
     *          response=200,
     *          description="Gerentes",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="string", example="5"),
     *              @OA\Property(property="name", type="string", example="Gerente 1 Teste"),
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
     *              @OA\Property(property="message", type="string", example="esse nome já está sendo usado"),
     *              @OA\Property(property="errors", type="string", example="..."),
     *          )
     *      )
     * ),
     */
    public function index()
    {
        $gerenteServices = new GerenteServices();
        $gerentes = $gerenteServices->index();

        return GerenteResource::collection($gerentes);
    }

     /**
     * @OA\POST(
     *  tags={"Gerente"},
     *  summary="Criar um novo Gerente",
     *  description="esse endpoint cria um novo Gerente",
     *  path="/api/gerente",
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(
     *             required={"nome"},
     *             @OA\Property(property="nome", type="string", example="Ivan Amado"),
     *             required={"email"},
     *             @OA\Property(property="email", type="string", example="peacevan2hotmail.com"),
     *             required={"nivel"},
     *             @OA\Property(property="nivel", type="integer", example="2"),
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
     * @OA\PUT(
     *  tags={"Gerente"},
     *  summary="Muda dados do gerente",
     *  description="esse endpoint muda os dados do Gerente",
     *  path="/api/gerente/{id}",
     *  security={ {"bearerToken":{}} },
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(
     *             required={"nome"},
     *             @OA\Property(property="nome", type="string", example="nome do gerente"),
     *             required={"email"},
     *             @OA\Property(property="email",type="string", example="emailgerente@hotmail.com"),
     *             required={"nivel"},
     *             @OA\Property(property="nivel",type="integer", example="2"),
     *          )
     *      ),
     *  ),
     *  @OA\Response(
     *    response=200,
     *    description="Nome do gerente atualizado com sucesso!",
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
     *         @OA\Property(property="message", type="string", example="Esse Nome já foi cadastrado"),
     *         @OA\Property(property="errors", type="string", example="..."),
     *      )
     *   )
     * )
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
     * @OA\DELETE(
     *  tags={"Gerente"},
     *  summary="Remove um  Gerente",
     *  description="Esse Endpoint remove um Gerente.",
     *  path="/api/gerente/{id}",
     *  security={ {"bearerToken":{}} },
     *  @OA\Response(
     *    response=200,
     *    description="Remove um Gerente",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="gerente removido com sucesso !")
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
     *       @OA\Property(property="message", type="string", example="nome do gerente é obrigatório."),
     *       @OA\Property(property="errors", type="string", example="..."),
     *    )
     *  )
     * )
     */
    public function destroy(Gerente $gerente)
    {
        $gerenteServices = new GerenteServices();
        $gerenteServices->destroy($gerente);

        return response()->json("DELETED", 204);
    }
}
