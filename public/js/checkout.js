Stripe.setPublishableKey('pk_test_myUXdvjr1sH4OT2Iz1mSKKvp');

var $form = $('.checkout_form');
$form.submit(function(event) {
    $('#charge-error').addClass('hidden-xs-down');
    $form.find('.purchase').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card_number').val(),
        exp_month: $('#card_expiry_month').val(),
        exp_year: $('#card_expiry_year').val(),
        cvc: $('#card_cvc').val(),
        name: $('#cardholer_name').val(),
    }, stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response) {
    var $form = $('.checkout_form');
    if (response.error) {
        $('#charge-error').removeClass('hidden-xs-down');
        $('#charge-error').text(response.error.message);
        $form.find('.purchase').prop('disabled', false);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" id="stripeToken" />').val(token));
        $form.get(0).submit();
    }
}
