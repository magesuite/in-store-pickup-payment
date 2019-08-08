<?php

namespace MageSuite\InStorePickupPayment\Observer;

class DisableAllPaymentMethodsForInStorePickup implements \Magento\Framework\Event\ObserverInterface
{
    protected $cart;

    public function __construct(\Magento\Checkout\Model\Cart $cart){
        $this->cart = $cart;
    }

    /**
     * payment_method_is_active event handler.
     *
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $shippingMethod = $this->cart->getQuote()->getShippingAddress()->getShippingMethod();
        $paymentMethod = $observer->getEvent()->getMethodInstance()->getCode();

        if ($paymentMethod != "instorepickuppayment" && $shippingMethod == 'in_store_pickup') {
            $checkResult = $observer->getEvent()->getResult();
            $checkResult->setData('is_available', false);
        }

        if ($paymentMethod == "instorepickuppayment" && $shippingMethod != 'in_store_pickup') {
            $checkResult = $observer->getEvent()->getResult();
            $checkResult->setData('is_available', false);
        }
    }
}
