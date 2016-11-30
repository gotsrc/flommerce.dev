<!-- Select a Category -->
<p>
    {!! Form::label('category','Category:') !!}
    {!! Form::text('category_id', old('category_id'), ['class' => 'form-control']) !!}
</p>

<!-- Give the category a name. -->
<p>
    {!! Form::label('title','Title:') !!}
    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
</p>

<!-- Give a good description. -->
<p>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}
</p>

<!-- Set a Price for the Item -->
<p>
    {!! Form::label('price', 'Price &pound;:') !!}
    {!! Form::text('price', old('price'), ['class' => 'form-control']) !!}
</p>

<!-- Is the Item in the Sale? -->
<p>
    {!! Form::label('sale', 'In the Sale?') !!}
    {!! Form::text('sale', old('sale'), ['class' => 'form-control', 'maxlength' => '1']) !!}
</p>

<!-- Provide the slug. A slug is what the browser will read for SEO. -->
<p>
    {!! Form::label('slug','Slug:') !!}
    {!! Form::text('slug', old('slug'), ['class' => 'form-control']) !!}
</p>

<!-- Submit the form -->
<p>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
</p>
