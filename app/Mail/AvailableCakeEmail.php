<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvailableCakeEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $cake;
    /**
     * Criação de nova instância
     *
     * @return void
     */
    public function __construct($cake)
    {
        $this->cake = $cake;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.AvailableCake', $this->cake);
    }
}
