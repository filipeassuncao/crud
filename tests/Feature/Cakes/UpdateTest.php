<?php

namespace Tests\Feature\Cakes;

use App\Models\Cake;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     *
     * @return void
     */
    public function should_be_update_a_cake()
    {
        $cake = Cake::factory()->create([
            "name" => "bolo de chocolate",
            "weight" => "15.0",
            "price" => "5.00",
            "available_quantity" => "1"
        ]);

        $this->put("/api/cake/$cake->id", [
            "name" => "bolo de abacate",
            "weight" => "16.0",
            "price" => "6.00",
            "available_quantity" => "11"
        ])
        ->assertSuccessful()
        ->assertJsonFragment(['name' => 'bolo de abacate']);
    }

       /**
     * @test
     *
     * @return boolean
     */
    public function should_be_not_update_cake()
    {
        $cake = Cake::factory()->create();
        $this->put("/api/cake/$cake->id", [
            "name" => 124454,
            "weight" => "dasdsad",
            "price" => "dasdsad",
            "available_quantity" => "dasd"
        ])
        ->assertStatus(422)
        ->assertJson([
            "success" => "false",
            "data" => [
                 "name" =>  [
                    "O campo nome deve ser uma string."
                    ],
                    "weight" =>  [
                        "O campo weight deve ser um número."
                    ],
                    "price" => [
                        "O campo price deve ser um número."
                    ],
                    "available_quantity" =>  [
                        "O campo available quantity deve ser um número inteiro."
                    ]
                ]
        ]);
    }

        /**
     * @test
     *
     * @return boolean
     */
    public function should_be_404()
    {
        $this->put("/api/cake/9999")
        ->assertStatus(404);
    }
}
