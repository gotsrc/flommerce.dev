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
<!-- Provide the slug. A slug is what the browser will read for SEO. -->
<p>
{!! Form::label('slug','Slug:') !!}
{!! Form::text('slug', old('slug'), ['class' => 'form-control']) !!}
</p>
<!-- Submit the form -->
<p>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
</p>
