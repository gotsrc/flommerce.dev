<h5>Address Details:</h5>
    <div class="form-group">
        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Full Name', 'required', 'name' => 'name']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('address1', '', ['class' => 'form-control', 'placeholder' => 'Address Line 1', 'required', 'name' => 'address1']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('address2', '', ['class' => 'form-control', 'placeholder' => 'Address Line 2', 'name' => 'address2']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City', 'required', 'name' => 'city']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('county', '', ['class' => 'form-control', 'placeholder' => 'County', 'name' => 'county']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('post_code', '', ['class' => 'form-control', 'placeholder' => 'Postal Code', 'required', 'name' => 'post_code']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Country', 'required', 'name' => 'country']) !!}
    </div>
<hr />
<h5>Card Details</h5>
    <div class="form-group">
        {!! Form::text('cardholder_name', '', ['class' => 'form-control', 'placeholder' => 'Card Holder Name', 'required', 'id' => 'cardholder_name']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('card_number', '', ['class' => 'form-control', 'placeholder' => '0000-0000-0000-0000', 'maxlength' => '19', 'required', 'id' => 'card_number']) !!}
    </div>
    <div class="form-group">
            {!! Form::text('card_expiry_month', '', ['class' => 'form-control', 'placeholder' => '01', 'maxlength' => '2', 'required', 'id' => 'card_expiry_month']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('card_expiry_year', '', ['class' => 'form-control', 'placeholder' => '16','maxlength' => '2', 'required', 'id' => 'card_expiry_year']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('card_cvc', '', ['class' => 'form-control', 'placeholder' => 'CVC (3-Digit Code)','maxlength' => '3', 'required',  'id' => 'card_cvc']) !!}
    </div>
    {{ csrf_field() }}
    <button type="submit" class="button btn btn-success purchase" id="purchase" name="purchase">Buy Now</button>
