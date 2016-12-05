Stripe.setPublishableKey('pk_test_K5mCeK5dhR4mUc6fcaF9qmEd');

var $form = $('#checkout_form');

Stripe.card.createToken({
    number: $('#card_number').val(),
    cvc: $('#card_cvc').val(),
    exp_month: $('#card_expiry_month').val(),
    exp_year: $('#card_expiry_year').val(),
    name: $('#card_name').val()
}, stripeResponseHandler);
