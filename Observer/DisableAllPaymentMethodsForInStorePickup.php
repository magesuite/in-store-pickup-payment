<?php

namespace MageSuite\InStorePickupPayment\Observer;

class DisableAllPaymentMethodsForInStorePickup implements \Magento\Framework\Event\ObserverInterface
{
    protected $cart;

    public function __construct(\Magento\Checkout\Model\Cart $cart){
        $this->cart = $cart;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $shippingMethod = $this->cart->getQuote()->getShippingAddress()->getShippingMethod();
        $paymentMethod = $observer->getEvent()->getMethodInstance()->getCode();

        if ($paymentMethod != \MageSuite\InStorePickupPayment\Model\Payment\InStorePickup::PAYMENT_METHOD_INSTOREPICKUPPAYMENT_CODE && $shippingMethod == \Magento\InventoryInStorePickupShippingApi\Model\Carrier\InStorePickup::DELIVERY_METHOD) {
            $checkResult = $observer->getEvent()->getResult();
            $checkResult->setData('is_available', false);
        }

        if ($paymentMethod == \MageSuite\InStorePickupPayment\Model\Payment\InStorePickup::PAYMENT_METHOD_INSTOREPICKUPPAYMENT_CODE && $shippingMethod != \Magento\InventoryInStorePickupShippingApi\Model\Carrier\InStorePickup::DELIVERY_METHOD) {
            $checkResult = $observer->getEvent()->getResult();
            $checkResult->setData('is_available', false);
        }
    }
}
