@extends('flommerce')

@section('content')
<section id="product_edit" class="section-top-margin">
    <div class="container">
        <div class="row">
            <div class="card">
                <h4 class="card-header">Editing: <small>{!! $product->title !!}</small></h4>

                <div class="card-block">
                    @include ('errors.list')
                <!-- Create the form -->
                    {!! Form::model($product, ['method' => 'PATCH', 'action' => ['ProductsController@update', $product->id]]) !!}
                        @include ('products.form', ['submitButtonText' => 'Edit Product'])
                <!-- Close the form -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@stop
