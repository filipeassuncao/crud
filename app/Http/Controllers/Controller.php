<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

  /**
    * @OA\Info(
    *      version="1.0.0",
    *      title="Documentação API backend",
    *      description="Documentação API backend - CRUD",
    *      @OA\Contact(
    *          email="assuncaofilipe97@gmail.com"
    *      ),
    * )
    *
    * @OA\Server(
    *      url=L5_SWAGGER_CONST_HOST,
    *      description="Local"
    * ),
    *
    */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
