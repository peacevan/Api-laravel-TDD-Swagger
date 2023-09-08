<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClienteRequest;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use App\Services\ClienteServices;

class ClienteController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $clienteServices = new ClienteServices();
        $clientes = $clienteServices->initialize();
        return ClienteResource::collection($clientes);
    }

    /**
     * @OA\Get(
     *     tags={"Cliente"},
     *     summary="Listar Clientes",
     *     description="Retorna todos os Clientes",
     *     path="/api/cliente",
     *     security={ {"bearerToken":{}} },
     *     @OA\Response(
     *          response=200,
     *          description="Clientes",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="string", example="5"),
     *              @OA\Property(property="name", type="string", example="Cliente 1 Teste"),
     *              @OA\Property(property="cnpj", type="string", example="000220007878"),
     *              @OA\Property(property="data_fundacao", type="string", example="17/05/2010"),
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
     *          description="Campo Incorreto",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="esse nome já está sendo usado"),
     *              @OA\Property(property="errors", type="string", example="..."),
     *          )
     *      )
     * ),
     */
    public function index()
    {
        $clienteServices = new ClienteServices();
        $clientes = $clienteServices->index();

        return ClienteResource::collection($clientes);
    }

    /**
     * @OA\POST(
     *  tags={"Cliente"},
     *  summary="Criar um novo Cliente",
     *  description="esse endpoint cria um novo Cliente",
     *  path="/api/cliente",
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(
     *             required={"nome"},
     *             @OA\Property(property="nome", type="string", example="Ivan Amado"),
     *             required={"cnpj"},
     *             @OA\Property(property="cnpj", type="string", example="1212122122122"),
     *             required={"data_fundacao"},
     *             @OA\Property(property="data_fundacao", type="date", example="17/05/2010"),
     *              required={"id_grupo"},
     *             @OA\Property(property="id_grupo", type="integer", example=3),
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
    public function store(ClienteRequest $request)
    {

        if ($this->deniesPermission("add-remove-client")) {
            return response()->json("Acess Denied", 403);
        }
        $clienteServices = new ClienteServices();
        $cliente = $clienteServices->store($request->validated());
        return new ClienteResource($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return new ClienteResource($cliente);
    }

    /**
     * @OA\PUT(
     *  tags={"Cliente"},
     *  summary="Mudar dados do cliente",
     *  description="esse endpoint muda os dados do cliente",
     *  path="/api/cliente/{id}",
     *  security={ {"bearerToken":{}} },
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(
     *          required={"nome"},
     *             @OA\Property(property="nome", type="string", example="Ivan Amado"),
     *             required={"cnpj"},
     *             @OA\Property(property="cnpj", type="string", example="1212122122122"),
     *             required={"data_fundacao"},
     *             @OA\Property(property="data_fundacao", type="date", example="17/05/2010"),
     *              required={"id_grupo"},
     *             @OA\Property(property="id_grupo", type="integer", example=3),
     *          )
     *      ),
     *  ),
     *  @OA\Response(
     *    response=200,
     *    description="Cliente atualizado com sucesso!",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Cliente atualizado com sucesso!"),
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
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $clienteServices = new ClienteServices();
        $updated = $clienteServices->update($request->validated(), $cliente);

        if ($updated) {
            return new ClienteResource($cliente);
        }
        return response()->json([], 202);
    }


    /**
     * @OA\DELETE(
     *  tags={"Cliente"},
     *  summary="Remove um Cliente",
     *  description="Esse Endpoint remove um Gerente.",
     *  path="/api/cliente/{id}",
     *  security={ {"bearerToken":{}} },
     *  @OA\Response(
     *    response=204,
     *    description="Remove um cliente",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Cliente removido com sucesso !")
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
     *       @OA\Property(property="message", type="string", example="nome do Cliente é obrigatório."),
     *       @OA\Property(property="errors", type="string", example="..."),
     *    )
     *  )
     * )
     */
    public function destroy(Cliente $cliente)
    {
        $clienteServices = new ClienteServices();
        $clienteServices->destroy($cliente);
        return response()->json("DELETED", 204);
    }
}
