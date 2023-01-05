define([
    'uiComponent',
    'Magento_Checkout/js/model/payment/renderer-list'
], function (Component, rendererList) {
    'use strict';

    rendererList.push(
        {
            type: 'instorepickuppayment',
            component: 'MageSuite_InStorePickupPayment/js/view/payment/method-renderer/in-store-pickup-payment'
        }
    );

    /** Add view logic here if needed */
    return Component.extend({});
});
