<?php

namespace App\Actions\Cakes;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCakeRequest;
use App\Http\Resources\CakesResource;
use App\Models\Cake;
use App\Traits\Response;

class Update extends Controller
{

    use Response;
  /**
   * Construtor
   *
   */
    public function __construct()
    {

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
    public function __invoke(int $id, UpdateCakeRequest $request)
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
}
