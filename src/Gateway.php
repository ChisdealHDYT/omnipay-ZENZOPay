<?php

namespace Omnipay\ZENZOPay;

use Omnipay\Common\AbstractGateway;

/**
 * CheckoutCom Class
 */
class Gateway extends AbstractGateway
{
    /**
     * Get name of the gateway
     *
     * @return string
     */
    public function getName()
    {
        return 'ZENZOPay';
    }

    public function getDefaultParameters()
    {
        return array(
            'address' => '',
            'amount' => '',
        );
    }
    
    public function getAddress()
    {
        return $this->getParameter('address');
    }
    
    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\ZENZOPay\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\ZENZOPay\Message\CompletePurchaseRequest', $parameters);
    }

   /* public function cardTokenPurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\CheckoutCom\Message\CardTokenPurchaseRequest', $parameters);
    }*/
}
