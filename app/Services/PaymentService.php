<?php

namespace App\Services;

class PaymentService
{
    protected $gateway;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function process()
    {
        return 'paid service';

        return $this->gateway->execute();
    }
}
