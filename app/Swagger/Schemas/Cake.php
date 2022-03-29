<?php

namespace App\Swagger\Schemas;

/**
*    @OA\Schema(
*    schema="cake",
*    type="object",
*        @OA\Property(property="id", type="integer"),
*        @OA\Property(property="name", type="string", maxLength=100),
*        @OA\Property(property="weight", type="double", format="decimal(8,2)"),
*        @OA\Property(property="price", type="double", format="decimal(8,2)"),
*        @OA\Property(property="avalaible_quantity", type="integer"),
*        @OA\Property(property="deleted_at", type="string"),
*        @OA\Property(property="created_at", type="string"),
*        @OA\Property(property="updated_at", type="string"),
*    ),
*/

class Cake {}
