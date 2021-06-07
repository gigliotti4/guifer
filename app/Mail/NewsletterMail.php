<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $data , $type = 0 )
    {
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if( $this->type ) {
            return $this->subject('Newsletter')
            ->view('form.newsletter')->with( [ "txt" => $this->data[ "txt" ]] );
        } else {
            return $this->subject('Newsletter')
            ->view('form.newsletter')->with( [ "data" => $this->data ] );
        }
    }
}