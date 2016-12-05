Stripe.setPublishableKey('pk_test_K5mCeK5dhR4mUc6fcaF9qmEd');

var $form = $('#checkout_form');

$form.submit(function(event) {
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card_number').val(),
        cvc: $('#card_cvc').val(),
        exp_month: $('#card_expiry_month').val(),
        exp_year: $('#card_expiry_year').val(),
        name: $('#card_name').val()
    }, stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response) {
    if (response.error) {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));

        $form.get(0).submit();
    }
}
