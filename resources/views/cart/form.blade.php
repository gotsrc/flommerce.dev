{!! Form::hidden('product_id',$product->id) !!}
<!-- How many items? -->
<p>
    {!! Form::label('quantity','Quantity:') !!}
    {!! Form::text('quantity', '1', ['class' => 'form-control']) !!}

</p>
<p>{!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}</p>
