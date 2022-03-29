<?php

namespace App\Actions\Cakes;

use App\Http\Controllers\Controller;
use App\Http\Requests\CakeRequest;
use App\Http\Resources\CakesResource;
use App\Models\Cake;

class Create extends Controller
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
    public function __invoke(CakeRequest $request)
    {
        $cake = Cake::create($request->all());

        return response()->json([
            'success' => 'true',
            'data' => new CakesResource($cake)
        ]);
    }
}
