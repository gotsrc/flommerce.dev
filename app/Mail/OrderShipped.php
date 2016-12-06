<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Order Instance.
     *
     * @var Order
     */
    public $disorder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $disorder)
    {
        $this->order = $disorder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orders.processed')
                    ->with([
                        'order_name' => $this->order->name,
                        'order_price' => $this->order->price
                    ]);
    }
}
