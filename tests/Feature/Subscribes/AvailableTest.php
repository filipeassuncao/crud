<?php

namespace Tests\Feature\Subscribes;

use App\Models\Cake;
use App\Models\Subscribe;
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
        $cake = Cake::factory()->create();
        Subscribe::factory()->create(['cake_id' => $cake->id]);

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
