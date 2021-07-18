<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $name)
    {
        $this->order = $order;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from ShoseShop.com')
                    ->view('backend.sendmail.sendmail');
    }
}
