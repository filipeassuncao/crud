<?php

namespace Tests\Feature\Cakes;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     *
     * @return void
     */
    public function should_be_create_a_cake()
    {
        $this->post('/api/cake', [
            "name" => "bolo de chocolate",
            "weight" => "15.0",
            "price" => "5.00",
            "available_quantity" => "1"
        ])
        ->assertSuccessful()
        ->assertJsonStructure(
            [
                "success",
                "data" => [
                      "id",
                      "name",
                      "weight",
                      "price",
                      "available_quantity",
                      "deleted_at",
                      "updated_at",
                      "created_at"
                   ]
             ]
        );
    }

    /**
     * @test
     *
     * @return boolean
     */
    public function should_be_not_create_cake()
    {
        $this->post('/api/cake')
        ->assertStatus(422)
        ->assertJson([
            "success" => "false",
            "data" => [
                "name" => [
                    "O campo nome é obrigatório."
                ],
                "weight" => [
                    "O campo weight é obrigatório."
                ],
                "price" => [
                    "O campo price é obrigatório."
                ],
                "available_quantity" => [
                    "O campo available quantity é obrigatório."
                ]
            ]
        ]);
    }
}
