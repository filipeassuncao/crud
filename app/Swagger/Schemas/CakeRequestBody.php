<?php

namespace App\Swagger\Schemas;

/**
*    @OA\Schema(
*    schema="cakeRequestBody",
*    type="object",
*
*        @OA\Property(property="name", type="string", maxLength=100),
*        @OA\Property(property="weight", type="double", format="decimal(8,2)"),
*        @OA\Property(property="price", type="double", format="decimal(8,2)"),
*        @OA\Property(property="avalaible_quantity", type="integer"),
*    ),
*/

class CakeRequestBody {}
