<?php

namespace Omnipay\ZENZOPay\Message;

class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('address', 'amount');

        $data = array();
        $data['address'] = $this->getAddress();
        $data['amount'] = $this->getAmount();
        
        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest($data);

        return $this->response = new PurchaseResponse($this, $httpResponse->json());
    }
    
}
