<?php

namespace Omnipay\CheckoutCom\Message;

class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{

    public function getTransactionReference()
    {
        if (isset($this->data['id'])) {
            return $this->data['id'];
        }

        return null;

    }

    public function getMessage()
    {
        if (!$this->isSuccessful() && isset($this->data['errorCode'])) {
            return $this->data['errorCode'] . ': ' . $this->data['message'];
        }

        return null;
    }

    public function isSuccessful()
    {
        return !isset($this->data['errorCode']);
    }
}
