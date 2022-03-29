<?php

namespace Tests\Feature\Jobs;

use App\Jobs\AvailableCakeEmailJob;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class AvailableCakeEmailJobTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     *
     * @return void
     */
    public function should_dispatch_available_cake_email_job() : void
    {

        Bus::fake();
        AvailableCakeEmailJob::dispatch('email', []);
        Bus::assertDispatched(AvailableCakeEmailJob::class);
    }

     /**
     * @test
     *
     * @return void
     */
    public function should_queue_available_cake_email_job() : void
    {
        Queue::fake();
        AvailableCakeEmailJob::dispatch('email', []);
        Queue::assertPushed(AvailableCakeEmailJob::class);
    }
}
