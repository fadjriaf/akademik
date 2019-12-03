<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AkademikEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');

        return $this->from('pengirim@akademik.com')
                   ->view('emailku')
                   ->with(
                    [
                        'nama' => 'Fadjri Alfalah',
                        'website' => 'fadjriaf.github.io',
                    ]);
    }
}
