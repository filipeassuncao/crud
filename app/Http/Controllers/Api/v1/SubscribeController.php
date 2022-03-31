<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Jobs\AvailableCakeEmailJob;
use App\Models\Cake;
use App\Models\Subscribe as SubcribeModel;
use App\Traits\Response;

class SubscribeController extends Controller
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
     * @OA\Post(
     *   tags={"subscribe"},
     *   summary="Receber atualização de disponibilidade de um bolo",
     *   description="É realizado a inscrição no bolo desejado para receber um email caso o bolo fique disponível.",
     *   path="/api/cake/{id}/subscribe",
    *    @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="email", type="string", maxLength=150),
     *         @OA\Examples(example="change-status", summary="Fazer inscrição de atualizações de um bolo",
     *          value={
     *               "email": "zezinho@gmail.com"
     *         }),
     *       )
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Inscrição de atualizações.",
     *           @OA\JsonContent(
     *           @OA\Property(property="success", type="string"),
     *           @OA\Property(property="data", type="object",
     *               @OA\Property(property="message", type="string"),
     *           ),
     *           example={
     *                   "success": "true",
     *                      "data": {
     *                          "message": "Inscrição realizada com sucesso."
     *                      }
     *                },
     *       ),
     *    ),
     *    @OA\Response(
     *      response=422,
     *      description="Campos inválidos",
     *      @OA\JsonContent(
     *           @OA\Property(property="success", type="string"),
     *           @OA\Property(property="data", type="object",
     *               @OA\Property(property="email", type="string"),
     *               @OA\Property(property="password", type="string"),
     *           ),
     *         @OA\Examples(example="obrigatório", summary="Campos obrigatórios",
     *          value={
     *               "success" : "false",
     *               "data": {
     *                   "email": {
     *                       "O campo email é obrigatório."
     *                        }
     *                     }
     *                  }),
     *          @OA\Examples(example="em uso", summary="Em uso",
     *          value={
     *              "success": "false",
     *                       "data": {
     *                           "email": {
     *                               "O campo email já está sendo utilizado."
     *                           }
     *                       }
     *                  }),
     *          @OA\Examples(example="Inválido", summary="Inválido",
     *          value={
     *              "success": "false",
     *                       "data": {
     *                           "email": {
     *                                "O campo email deve ser um endereço de e-mail válido."
     *                           }
     *                       }
     *                  }),
     *       )
     * ),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(int $id, SubscribeRequest $request)
    {
        $cake = Cake::find($id);

        if(empty($cake)) {
            return $this->responseError('Bolo inexistente');
        }

        SubcribeModel::updateOrCreate([
            'cake_id' => $id,
            'email' => $request->get('email')
        ]);

        return response()->json([
            'success' => 'true',
            'data' => [
                'message' =>  'Inscrição realizada com sucesso.'
            ]
        ]);
    }

     /**
     * @OA\Post(
     *   tags={"subscribe"},
     *   summary="Disparo de emails informando a disponibilidade dos bolos para emails inscritos",
     *   description="É realizado o disparo de email em massa para para os emails inscritos na atualização
      de disponibilidade de um bolo cadastrado.",
     *   path="/api/cakes/send-email/available",
     *   @OA\Response(
     *      response=200,
     *      description="Envio de email em massa.",
     *           @OA\JsonContent(
     *           @OA\Property(property="success", type="string"),
     *           @OA\Property(property="data", type="object",
     *               @OA\Property(property="message", type="string"),
     *           ),
     *           example={
     *                   "success": "true",
     *                      "data": {
     *                          "message": "Disparo de emails iniciado com sucesso."
     *                      }
     *                },
     *       ),
     *    ),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmailAvailableCakes()
    {
        AvailableCakeEmailJob::dispatch();

        return response()->json([
            'sucess' => 'true',
            'data' => [
                'message' => "Disparo de emails iniciado com sucesso."
            ]
        ]);
    }
}
