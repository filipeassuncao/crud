<?php

namespace App\Actions\Cakes;

use App\Http\Controllers\Controller;
use App\Http\Resources\CakesResource;
use App\Models\Cake;
use App\Traits\Response;
use Illuminate\Http\JsonResponse;

class Show extends Controller
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
    public function __invoke(int $id)
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
}
