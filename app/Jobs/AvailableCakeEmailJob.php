<?php

namespace App\Jobs;

use App\Mail\AvailableCakeEmail;
use App\Models\Cake;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AvailableCakeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $cakes = Cake::where('available_quantity', '>', 0)->get();

        $cakes->map(function ($cake) {
            if(!$cake->subscribes->isEmpty()) {
                $cake->subscribes->map( function ($subscribe) use ($cake) {
                    Mail::to($subscribe->email)->send(new AvailableCakeEmail($cake->toArray()));
                });
            }
        });

    }
}
