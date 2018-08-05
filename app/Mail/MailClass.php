<?php

namespace App\Mail;

use App\Http\Controllers\UploadController;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $emailHash;
    protected $nameHash;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailHash, $nameHash)
    {
        $this->emailHash = $emailHash;
        $this->nameHash = $nameHash;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('putinkarus@gmail.com','Laravel')
            ->view('email.contact-mail')
            ->with([
                'emailHash' => $this->emailHash,
                'nameHash' => $this->nameHash
            ])
            ->subject('Доступ к файлу');
    }
}
