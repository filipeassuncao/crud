<?php

namespace Tests\Feature\Cakes;

use App\Models\Cake;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     *
     * @return void
     */
    public function should_be_delete_a_cake()
    {
        $cake = Cake::factory()->create();

        $this->delete("/api/cake/$cake->id" )
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
    public function should_be_404()
    {
        $this->delete("/api/cake/9999")
        ->assertStatus(404);
    }
}
