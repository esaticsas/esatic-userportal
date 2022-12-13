<?php

namespace Esatic\ActiveUser\mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyNewAccount extends Mailable
{
    use Queueable, SerializesModels;

    private string $user;
    private string $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('Esatic::mail')
            ->with('user', $this->user)
            ->with('password', $this->password)
            ->subject(config('user-crm.subject'));
    }
}
