<?php

namespace Tests\Unit;

use App\Traits\Response;
use Tests\TestCase;

class ResponseTraitTest extends TestCase
{
    use Response;
    /**
     * @test
     */
    public function response_error()
    {
        $response = json_decode($this->responseError('Bolo inexistente')->getContent(),true);
        $this->assertEquals([
            "success" => "false",
            "data" => [
                "message" => "Bolo inexistente"
            ]
        ], $response);
    }
}
