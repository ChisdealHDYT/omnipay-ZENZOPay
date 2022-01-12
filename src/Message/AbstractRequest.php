<?php

namespace Omnipay\CheckoutCom\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    protected $liveEndpoint = 'https://api2.checkout.com/v2';

    public function getAddress($value)
    {
        return $this->getParameter('address', $value);
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    public function sendRequest($data)
    {
        // don't throw exceptions for 4xx errors
        $this->httpClient->getEventDispatcher()->addListener(
            'request.error',
            function ($event) {
                if ($event['response']->isClientError()) {
                    $event->stopPropagation();
                }
            }
        );

        $httpRequest = $this->httpClient->createRequest(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            null,
            !empty($data) ? json_encode($data) : null
        );

        $httpRequest
            ->setHeader('Content-Type', 'application/json;charset=UTF-8')
            ->setHeader('Accept', 'application/json');

        return $httpRequest->send();
    }

    /**
     * Get HTTP Method.
     *
     * This is nearly always POST but can be over-ridden in sub classes.
     *
     * @return string
     */
    public function getHttpMethod()
    {
        return 'GET';
    }

    public function getEndpoint()
    {
        return $this->liveEndpoint;
    }
    
}
