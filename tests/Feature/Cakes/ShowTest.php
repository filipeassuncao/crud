<?php

namespace Tests\Feature\Cakes;

use App\Models\Cake;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     *
     * @return void
     */
    public function should_be_get_cake()
    {
        $cake = Cake::factory()->create();

        $this->get("/api/cake/$cake->id")
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
                    "created_at",
                    "updated_at"
                ],
            ]
        );
    }

    /**
     * @test
     *
     * @return boolean
     */
    public function should_be_404()
    {
        $this->get("/api/cake/9999")
        ->assertStatus(404);
    }
}
