{!! Form::hidden('product_id',$product->id) !!}
<!-- How many items? -->
<p>
    {!! Form::label('quantity','Quantity:') !!}
    {!! Form::text('quantity', old('quantity'), ['class' => 'form-control']) !!}
</p>
