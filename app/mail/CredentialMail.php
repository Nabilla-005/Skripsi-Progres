<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredentialMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nim;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nim, $password)
    {
        $this->nim = $nim;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.credential') // nama view email
                    ->subject('Credential Mahasiswa') // Subjek email
                    ->with([
                        'nim' => $this->nim,
                        'password' => $this->password,
               ]);
}
}
