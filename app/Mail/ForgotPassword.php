<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ForgotPassword extends Mailable
{
	public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(
            'mail.ForgotPassword',
            [
                'resetPasswordUrl' => env('APP_DOMAIN') . '/auth/reset/' . $this->user->verify_email_token
            ]
        );
    }
}