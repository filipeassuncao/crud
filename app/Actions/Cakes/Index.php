<?php

namespace App\Actions\Cakes;

use App\Http\Controllers\Controller;
use App\Http\Resources\CakeCollection;
use App\Http\Resources\CakesResource;
use App\Models\Cake;

class Index extends Controller
{

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
    public function __invoke($page = 1)
    {
        return new CakeCollection(Cake::paginate(10));
    }
}
