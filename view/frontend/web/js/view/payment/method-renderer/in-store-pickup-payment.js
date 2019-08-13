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
        /**
         * Always allows placing order with this method as it doesn't require any additional validation.
         */
        isPlaceOrderActionAllowed: ko.observable(function() {
            this.getCode() == this.isChecked();
        }, this),
        /**
         * Copies shipping address to billing address just before order is placed.
         */
        placeOrder: function(data, event) {
            quote.billingAddress(quote.shippingAddress());

            this._super(data, event);
        },
    });
});
