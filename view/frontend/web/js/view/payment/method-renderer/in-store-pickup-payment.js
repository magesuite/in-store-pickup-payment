/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/* @api */
define([
    'knockout',
    'Magento_Checkout/js/view/payment/default',
    'Magento_Checkout/js/model/quote',
], function(ko, Component, quote) {
    'use strict';

    return Component.extend({
        defaults: {
            template:
                'MageSuite_InStorePickupPayment/payment/in_store_pickup_payment',
        },
        isRadioButtonVisible: ko.observable(true),
    });
});
