<h4>Address Details:</h4>
<div class="form-group">
    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Full Name', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::text('address1', '', ['class' => 'form-control', 'placeholder' => 'Address Line 1', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::text('address2', '', ['class' => 'form-control', 'placeholder' => 'Address Line 2']) !!}
</div>
<div class="form-group">
    {!! Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::text('county', '', ['class' => 'form-control', 'placeholder' => 'County']) !!}
</div>
<div class="form-group">
    {!! Form::text('post_code', '', ['class' => 'form-control', 'placeholder' => 'Postal Code', 'required#']) !!}
</div>
<div class="form-group">
    {!! Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Country', 'required']) !!}
</div>
<hr />
<h4>Card Details</h4>
<div class="form-group">
    {!! Form::text('card_number', '', ['class' => 'form-control', 'placeholder' => '0000-0000-0000-0000', 'maxlength' => '19', 'required']) !!}
</div>
<div class="form-group">
        {!! Form::text('expiry_month', '', ['class' => 'form-control', 'placeholder' => '01', 'maxlength' => '2', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::text('expiry_year', '', ['class' => 'form-control', 'placeholder' => '16','maxlength' => '2', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::text('cvc', '', ['class' => 'form-control', 'placeholder' => 'CVC (3-Digit Code)','maxlength' => '3', 'required']) !!}
</div>
<p>{!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}</p>
