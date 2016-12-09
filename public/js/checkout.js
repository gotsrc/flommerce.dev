Stripe.setPublishableKey('pk_test_K5mCeK5dhR4mUc6fcaF9qmEd');


var $form = $('#checkout_form');
$(function(event) {
    $('#charge-error').addClass('hidden');
    $form.find('.button').prop('disabled', true);
    Stripe.card.createToken({
        name: $('#card_name').val(),
        number: $('#card_number').val(),
        exp_month: $('#card_expiry_month').val(),
        exp_year: $('#card_expiry_year').val(),
        cvc: $('#card_cvc').val(),
    }, stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response) {
    var $form = $('#checkout_form');
    if (response.error) {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('.button').prop('disabled', false);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        jQuery($form.get(0)).submit();
    }
}
