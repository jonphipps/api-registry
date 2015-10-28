<!-- Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id', 'Id:') !!}
	{!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('created_at', 'Created At:') !!}
	{!! Form::date('created_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('updated_at', 'Updated At:') !!}
	{!! Form::date('updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted At Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
	{!! Form::date('deleted_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Updated Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('last_updated', 'Last Updated:') !!}
	{!! Form::date('last_updated', null, ['class' => 'form-control']) !!}
</div>

<!-- Created User Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('created_user_id', 'Created User Id:') !!}
	{!! Form::number('created_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated User Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('updated_user_id', 'Updated User Id:') !!}
	{!! Form::number('updated_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Uri Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('uri', 'Uri:') !!}
	{!! Form::text('uri', null, ['class' => 'form-control']) !!}
</div>

<!-- Pref Label Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pref_label', 'Pref Label:') !!}
	{!! Form::text('pref_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Vocabulary Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('vocabulary_id', 'Vocabulary Id:') !!}
	{!! Form::number('vocabulary_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Top Concept Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_top_concept', 'Is Top Concept:') !!}
	{!! Form::text('is_top_concept', null, ['class' => 'form-control']) !!}
</div>

<!-- Pref Label Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pref_label_id', 'Pref Label Id:') !!}
	{!! Form::number('pref_label_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('status_id', 'Status Id:') !!}
	{!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('language', 'Language:') !!}
	{!! Form::text('language', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
