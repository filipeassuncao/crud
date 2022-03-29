<?php

namespace Tests\Feature\Cakes;

use App\Models\Cake;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     *
     * @return void
     */
    public function should_be_get_all_cakes()
    {
         Cake::factory()->create();

        $this->get('/api/cakes')
        ->assertSuccessful()
        ->assertJsonStructure(
            [
                "sucess",
                "data" => [
                    [
                        [
                            "id",
                            "uuid" ,
                            "name",
                            "weight",
                            "price",
                            "available_quantity",
                            "deleted_at",
                            "created_at",
                            "updated_at"
                        ]
                    ],
                ],
                "links" => [
                    "first",
                    "last",
                    "prev",
                    "next"
                ],
                "meta" => [
                    "current_page",
                    "from",
                    "last_page",
                    "links" => [
                        [
                            "url",
                            "label",
                            "active"
                        ],
                        [
                            "url",
                            "label",
                            "active"
                        ],
                        [
                            "url",
                            "label",
                            "active"
                        ]
                    ],
                    "path",
                    "per_page",
                    "to",
                    "total"
                    ]
                ]
        );

    }
}
