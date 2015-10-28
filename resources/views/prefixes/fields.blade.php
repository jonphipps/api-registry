<!-- Prefix Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('prefix', 'Prefix:') !!}
	{!! Form::text('prefix', null, ['class' => 'form-control']) !!}
</div>

<!-- Uri Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('uri', 'Uri:') !!}
	{!! Form::text('uri', null, ['class' => 'form-control']) !!}
</div>

<!-- Rank Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rank', 'Rank:') !!}
	{!! Form::number('rank', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
