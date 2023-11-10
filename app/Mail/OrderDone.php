<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDone extends Mailable
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
        dd($this->data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pvc2000atk@gmail.com', 'Tâm Trà')
            ->subject("Đặt Hàng Thành Công")
            ->view('mail.orderdone', ['data' => $this->data]);
    }
}
