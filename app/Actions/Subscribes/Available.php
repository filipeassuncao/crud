<?php

namespace App\Actions\Subscribes;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Jobs\AvailableCakeEmailJob;
use App\Models\Cake;
use App\Notifications\AvailableCakeNotification;
use App\Traits\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class Available extends Controller
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
     *   summary="Disparo de emails informando a disponibilidade dos bolos para emails inscritos",
     *   description="É realizado o disparo de email em massa para para os emails inscritos na atualização
      de disponibilidade de um bolo cadastrado.",
     *   path="/api/cake/send-email/available",
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
    public function __invoke()
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
