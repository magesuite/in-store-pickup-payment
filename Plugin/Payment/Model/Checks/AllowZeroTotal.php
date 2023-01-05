<?php

namespace MageSuite\InStorePickupPayment\Plugin\Payment\Model\Checks;

class AllowZeroTotal
{
    public function afterIsApplicable(\Magento\Payment\Model\Checks\ZeroTotal $subject, $result, \Magento\Payment\Model\MethodInterface $paymentMethod, \Magento\Quote\Model\Quote $quote)
    {
        if ($paymentMethod->getCode() === \MageSuite\InStorePickupPayment\Model\Payment\InStorePickup::PAYMENT_METHOD_INSTOREPICKUPPAYMENT_CODE) {
            return true;
        }

        return $result;
    }
}
