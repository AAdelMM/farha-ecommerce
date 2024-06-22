<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order, $products;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $products)
    {
        $this->order = $order;
        $this->products =  $products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your order on semascarf.com is shipped')->view('control.orders.order-sent');
    }
}