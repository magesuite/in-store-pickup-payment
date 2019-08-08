<?php

namespace MageSuite\InStorePickupPayment\Model\Payment;

class InStorePickup extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_INSTOREPICKUPPAYMENT_CODE = 'instorepickuppayment';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_INSTOREPICKUPPAYMENT_CODE;

    /**
     * Cash On Delivery payment block paths
     *
     * @var string
     */
    protected $_formBlockType = \Magento\OfflinePayments\Block\Form\Cashondelivery::class;

    /**
     * Info instructions block path
     *
     * @var string
     */
    protected $_infoBlockType = \Magento\Payment\Block\Info\Instructions::class;

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * Get instructions text from config
     *
     * @return string
     */
    public function getInstructions()
    {
        return trim($this->getConfigData('instructions'));
    }
}

