<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var mixed|null
     */
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = null)
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
        return $this->from('pvc2000atk@gmail.com', 'Tâm Trà')
            ->subject("Đăng ký thành viên Tâm Trà")
            ->view('mail.verify_register', ['data' => $this->data]);
    }
}
