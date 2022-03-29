<?php

namespace Tests\Feature\Subscribes;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AvailableTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     *
     * @return void
     */
    public function should_be_post_available_return_ok()
    {
        $this->post('/api/cake/send-email/available')
        ->assertSuccessful()
        ->assertJson([
            "sucess" => "true",
            "data" => [
                  "message" => "Disparo de emails iniciado com sucesso."
               ]
         ]);
    }
}
