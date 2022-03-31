<?php

namespace App\Actions\Cakes;

use App\Http\Controllers\Controller;
use App\Http\Requests\CakeRequest;
use App\Http\Requests\UpdateCakeRequest;
use App\Http\Resources\CakeCollection;
use App\Http\Resources\CakesResource;
use App\Models\Cake;

class CakeController extends Controller
{

  /**
   * Construtor
   *
   */
    public function __construct()
    {

    }

    /**
     * @OA\Post(
     *   tags={"cake"},
     *   summary="Cadastrar um bolo",
     *   description="Retorna um bolo cadastrado",
     *   path="/api/cake",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(
     *         type="object",
     *         @OA\Property(ref="#/components/schemas/cakeRequestBody"),
     *         @OA\Examples(example="register-profile", summary="Cadastrar um bolo",
     *          value={
     *             "name": "Bolo de chocolate",
     *             "weight": "800,00",
     *             "price": "150,00",
     *             "available_quantity": "5",
     *         }),
     *       ),
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Cadastro de de um bolo",
     *      @OA\JsonContent(
     *        @OA\Property(property="success", type="string"),
     *       @OA\Property(property="data", type="object",
     *        @OA\Property(ref="#/components/schemas/cake")
     *        ),
     *      example={
     *           "success": "true",
     *           "data": {
     *               "id": "2",
     *               "name": "bolo de chocolate",
     *               "weight": "150",
     *               "price": "5.00",
     *               "available_quantity": "1",
     *               "uuid": "0019b5c5-8390-4fcf-9db7-55d07a5f3860",
     *               "updated_at": "2022-03-28T22:19:57.000000Z",
     *               "created_at": "2022-03-28T22:19:57.000000Z"
     *           }
     *       },
     *       ),
     *    ),
     *   @OA\Response(response=422, description="Campos inválido",
     *     @OA\JsonContent(
     *            example={
     *               "success": "false",
     *               "data": {
     *                   "name": {
     *                       "O campo name é obrigatório.",
     *                       "O campo name não pode ser superior a 100 caracteres."
     *                   },
     *                   "weight": {
     *                       "O campo weight é obrigatório.",
     *                       "O campo weight não pode ser superior a 99999.",
     *                       "O campo weight deve ser pelo menos 0."
     *                   },
     *                   "price": {
     *                       "O campo price é obrigatório.",
     *                       "O campo price não pode ser superior a 99999.",
     *                       "O campo price deve ser pelo menos 0."
     *                   },
     *                   "available_quantity": {
     *                       "O campo available quantity é obrigatório.",
     *                       "O campo available quantity deve ser um número inteiro."
     *                   }
     *                 }
     *              },
     *          ),
     *       ),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CakeRequest $request)
    {
        $cake = Cake::create($request->all());

        return response()->json([
            'success' => 'true',
            'data' => new CakesResource($cake)
        ]);
    }

      /**
     * @OA\Get(
     *   tags={"cake"},
     *   summary="Listar todos os bolos",
     *   description="Retorna uma lista com os bolos cadastrados",
     *   path="/api/cakes",
     *   @OA\Response(
     *      response=200,
     *      description="Listagem de bolos cadastrados",
     *      @OA\JsonContent(
     *        @OA\Property(property="success", type="string"),
     *       @OA\Property(property="data", type="object",
     *        @OA\Property(ref="#/components/schemas/cake")
     *        ),
     *      example={
     *           "sucess": "true",
     *           "data": {
     *               {
     *                   "id": 2,
     *                   "uuid": "27eba493-58e0-47d2-9cbb-e510ee2d6a64",
     *                   "name": "bolo de chocolate",
     *                   "weight": "15.00",
     *                   "price": "5.00",
     *                   "available_quantity": 1,
     *                   "deleted_at": null,
     *                   "created_at": "2022-03-28T22:24:57.000000Z",
     *                   "updated_at": "2022-03-29T00:17:41.000000Z"
     *               },
     *               {
     *                   "id": 1037,
     *                   "uuid": "55a94567-147d-4354-bbbc-9397b263b153",
     *                   "name": "bolo de uva",
     *                   "weight": "18.00",
     *                   "price": "5.00",
     *                   "available_quantity": 1,
     *                   "deleted_at": null,
     *                   "created_at": "2022-03-29T10:26:31.000000Z",
     *                   "updated_at": "2022-03-29T10:26:31.000000Z"
     *               },
     *               {
     *                   "id": 1038,
     *                   "uuid": "77c44599-2030-46e4-a637-410734fa7ec9",
     *                   "name": "bolo de uva",
     *                   "weight": "18.00",
     *                   "price": "5.00",
     *                   "available_quantity": 1,
     *                   "deleted_at": null,
     *                   "created_at": "2022-03-29T10:48:12.000000Z",
     *                   "updated_at": "2022-03-29T10:48:12.000000Z"
     *               }
     *           },
     *           "links": {
     *               "first": "http://localhost:6001/api/cakes?page=1",
     *               "last": "http://localhost:6001/api/cakes?page=1",
     *               "prev": null,
     *               "next": null
     *           },
     *           "meta": {
     *               "current_page": 1,
     *               "from": 1,
     *               "last_page": 1,
     *               "links": {
     *                   {
     *                       "url": null,
     *                       "label": "&laquo; Anterior",
     *                       "active": false
     *                   },
     *                   {
     *                       "url": "http://localhost:6001/api/cakes?page=1",
     *                       "label": "1",
     *                       "active": true
     *                   },
     *                   {
     *                       "url": null,
     *                       "label": "Próximo &raquo;",
     *                       "active": false
     *                   }
     *               },
     *               "path": "http://localhost:6001/api/cakes",
     *               "per_page": 10,
     *               "to": 3,
     *               "total": 3
     *           }
     *         }
     *       ),
     *    ),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($page = 1)
    {
        return new CakeCollection(Cake::paginate(10));
    }

        /**
     * @OA\Get(
     *   tags={"cake"},
     *   summary="Listar as informações de um bolo",
     *   description="Retorna as informações de um bolo",
     *   path="/api/cake/{id}",
     *   @OA\Response(
     *      response=200,
     *      description="Informações de um bolo",
     *      @OA\JsonContent(
     *        @OA\Property(property="success", type="string"),
     *       @OA\Property(property="data", type="object",
     *        @OA\Property(ref="#/components/schemas/cake")
     *        ),
     *      example={
     *           "success": "true",
     *           "data": {
     *               "id" : "1",
     *               "name": "bolo de chocolate com avelã",
     *               "weight": "801",
     *               "price": "5.00",
     *               "available_quantity": "1",
     *               "uuid": "0019b5c5-8390-4fcf-9db7-55d07a5f3860",
     *               "updated_at": "2022-03-28T22:19:57.000000Z",
     *               "created_at": "2022-03-28T22:19:57.000000Z"
     *           }
     *       },
     *       ),
     *    ),
     *   @OA\Response(response=404, description="Bolo inexistente",
     *     @OA\JsonContent(
     *            example={
     *               "success": "false",
     *               "data": {
     *                   "message": "Bolo inexistente"
     *                 }
     *              },
     *          ),
     *       ),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $cake = Cake::find($id);

        if(empty($cake)) {
            return $this->responseError('Bolo inexistente');
        }

        return response()->json([
            'success' => 'true',
            'data' => new CakesResource($cake)
        ]);
    }


    /**
     * @OA\Put(
     *   tags={"cake"},
     *   summary="Atualizar informações de um bolo",
     *   description="Retorna um bolo atualizado",
     *   path="/api/cake/{id}",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(
     *         type="object",
     *         @OA\Property(ref="#/components/schemas/cakeRequestBody"),
     *         @OA\Examples(example="register-profile", summary="Atualiar um bolo",
     *          value={
     *             "name": "Bolo de chocolate com avelã",
     *             "weight": "801,00",
     *             "price": "150,00",
     *             "available_quantity": "5",
     *         }),
     *       ),
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Atualização de um bolo",
     *      @OA\JsonContent(
     *        @OA\Property(property="success", type="string"),
     *       @OA\Property(property="data", type="object",
     *        @OA\Property(ref="#/components/schemas/cake")
     *        ),
     *      example={
     *           "success": "true",
     *           "data": {
     *                "id": "2",
     *               "name": "bolo de chocolate com avelã",
     *               "weight": "801",
     *               "price": "5.00",
     *               "available_quantity": "1",
     *               "uuid": "0019b5c5-8390-4fcf-9db7-55d07a5f3860",
     *               "updated_at": "2022-03-28T22:19:57.000000Z",
     *               "created_at": "2022-03-28T22:19:57.000000Z"
     *           }
     *       },
     *       ),
     *    ),
     *   @OA\Response(response=422, description="Campos inválidos",
     *     @OA\JsonContent(
     *            example={
     *               "success": "false",
     *               "data": {
     *                   "name": {
     *                       "O campo name não pode ser superior a 100 caracteres."
     *                   },
     *                   "weight": {
     *                       "O campo weight não pode ser superior a 99999.",
     *                       "O campo weight deve ser pelo menos 0."
     *                   },
     *                   "price": {
     *                       "O campo price não pode ser superior a 99999.",
     *                       "O campo price deve ser pelo menos 0."
     *                   },
     *                   "available_quantity": {
     *                       "O campo available quantity deve ser um número inteiro."
     *                   }
     *                 }
     *              },
     *          ),
     *       ),
     *   @OA\Response(response=404, description="Bolo inexistente",
     *     @OA\JsonContent(
     *            example={
     *               "success": "false",
     *               "data": {
     *                   "message": "Bolo inexistente"
     *                 }
     *              },
     *          ),
     *       ),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id, UpdateCakeRequest $request)
    {
        $cake = Cake::find($id);

        if(empty($cake)) {
            return $this->responseError('Bolo inexistente');
        }

        $cake->update($request->all());

        return response()->json([
            'success' => 'true',
            'data' => new CakesResource($cake->fresh())
        ]);
    }

     /**
     * @OA\Delete(
     *   tags={"cake"},
     *   summary="Deletar um bolo",
     *   description="Retorna um bolo deletado",
     *   path="/api/cake/{id}",
     *   @OA\Response(
     *      response=200,
     *      description="Retorna as informações de um bolo deletado",
     *      @OA\JsonContent(
     *        @OA\Property(property="success", type="string"),
     *       @OA\Property(property="data", type="object",
     *        @OA\Property(ref="#/components/schemas/cake")
     *        ),
     *      example={
     *           "success": "true",
     *           "data": {
     *               "id": "2",
     *               "name": "bolo de chocolate com avelã",
     *               "weight": "801",
     *               "price": "5.00",
     *               "available_quantity": "1",
     *               "uuid": "0019b5c5-8390-4fcf-9db7-55d07a5f3860",
     *               "deleted_at": "2022-03-28T22:20:57.000000Z",
     *               "updated_at": "2022-03-28T22:19:57.000000Z",
     *               "created_at": "2022-03-28T22:19:57.000000Z"
     *           }
     *       },
     *       ),
     *    ),
     *   @OA\Response(response=404, description="Bolo inexistente",
     *     @OA\JsonContent(
     *            example={
     *               "success": "false",
     *               "data": {
     *                   "message" : "Bolo inexistente"
     *                 }
     *              },
     *          ),
     *       ),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invodeleke(int $id)
    {
        $cake = Cake::find($id);

        if(empty($cake)) {
            return $this->responseError('Bolo inexistente');
        }

        $cake->delete();

        return response()->json([
            'success' => 'true',
            'data' => new CakesResource($cake->fresh())
        ]);
    }
}
