<?php

namespace App\Jobs;

use App\Mail\OrderDone;
use App\Mail\VerifyRegister;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    private $email;
    private $dataOrder;
    private $dataUser;
    private $shipping;
    private $cart;
    private $coupon;
    private $priceShip;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $dataOrder, $dataUser, $shipping, $cart, $coupon, $priceShip)
    {
        $this->email = $email;
        $this->dataOrder = $dataOrder;
        $this->dataUser = $dataUser;
        $this->shipping = $shipping;
        $this->cart = $cart;
        $this->coupon = $coupon;
        $this->priceShip = $priceShip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = [
            'email' => $this->email,
            'dataOrder' => $this->dataOrder,
            'dataUser' => $this->dataUser,
            'shipping' => $this->shipping,
            'cart' => $this->cart,
            'coupon' => $this->coupon,
            'priceShip' => $this->priceShip,
        ];
        $data_array = json_decode(json_encode($data), true);
        Mail::to(strtolower($data_array['email']))->send(new OrderDone($data_array));
    }
}
