<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $product_name;
    public $quantity;
    public $price;
    public $total_price;
    public function __construct($name,$product_name,$quantity,$price,$total_price)
    {
        $this->name = $name;
        $this->product_name = $product_name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->total_price = $total_price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.orderemail');
    }
}
