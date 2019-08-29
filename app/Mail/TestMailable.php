<?php

namespace App\Mail;

use App\Entity\MainProduct\MainProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var MainProduct
     */
    private $mainProduct;

    /**
     * Create a new message instance.
     *
     * @param MainProduct $mainProduct
     */
    public function __construct(MainProduct $mainProduct)
    {
        //
        $this->mainProduct = $mainProduct;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.shipped', [
            'mainProduct' => $this->mainProduct
        ]);
    }
}
