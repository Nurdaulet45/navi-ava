<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->email_verify_uuid = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(__('site.Reset password') . ' - ' . config('mail.from.name'))
            ->from(config('mail.from.address'), config('mail.from.address'))
            ->view('mail.verifyEmail', ['token' => $this->email_verify_uuid]);
    }
}
