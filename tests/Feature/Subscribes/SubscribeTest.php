<?php

namespace Tests\Feature\Subscribes;

use App\Models\Cake;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SubscribeTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     *
     * @return void
     */
    public function should_be_post_subscribe_return_ok()
    {
        $cake = Cake::factory()->create();

        $this->post("/api/cake/$cake->id/subscribe",
            [
                'cake_ui' => $cake->id,
                'email' => 'teste@gmail.com'
            ]
        )
        ->assertSuccessful()
        ->assertJson([
            'success' => 'true',
            'data' => [
                'message' =>  'Inscrição realizada com sucesso.'
            ]
        ]);
    }

        /**
     * @test
     *
     * @return void
     */
    public function should_be_post_subscribe_return_404()
    {

        $this->post("/api/cake/9999/subscribe",
            [
                'cake_ui' => 9999,
                'email' => 'teste@gmail.com'
            ]
        )
        ->assertStatus(404)
        ->assertJson([
            "success" => "false",
            "data" => [
                  "message" => "Bolo inexistente"
               ]
         ]);
    }

      /**
     * @test
     *
     * @return void
     */
    public function should_be_post_subscribe_return_invalid_email()
    {
        $cake = Cake::factory()->create();

        $this->post("/api/cake/$cake->id/subscribe",
            [
                'cake_ui' => $cake->id,
                'email' => 'testedsadgmail.com'
            ]
        )
        ->assertStatus(422)
        ->assertJson([
            'success' => 'false',
            'data' => [
                'email' =>  [
                    'O campo email deve ser um endereço de e-mail válido.'
                ]
            ]
        ]);
    }
}
