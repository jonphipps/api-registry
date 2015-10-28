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

<!-- Action Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('action', 'Action:') !!}
	{!! Form::text('action', null, ['class' => 'form-control']) !!}
</div>

<!-- Concept Property Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('concept_property_id', 'Concept Property Id:') !!}
	{!! Form::number('concept_property_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Concept Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('concept_id', 'Concept Id:') !!}
	{!! Form::number('concept_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Vocabulary Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('vocabulary_id', 'Vocabulary Id:') !!}
	{!! Form::number('vocabulary_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Skos Property Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('skos_property_id', 'Skos Property Id:') !!}
	{!! Form::number('skos_property_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Object Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('object', 'Object:') !!}
	{!! Form::textarea('object', null, ['class' => 'form-control']) !!}
</div>

<!-- Scheme Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('scheme_id', 'Scheme Id:') !!}
	{!! Form::number('scheme_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Related Concept Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('related_concept_id', 'Related Concept Id:') !!}
	{!! Form::number('related_concept_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('language', 'Language:') !!}
	{!! Form::text('language', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('status_id', 'Status Id:') !!}
	{!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Created User Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('created_user_id', 'Created User Id:') !!}
	{!! Form::number('created_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Change Note Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('change_note', 'Change Note:') !!}
	{!! Form::textarea('change_note', null, ['class' => 'form-control']) !!}
</div>

<!-- Import Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('import_id', 'Import Id:') !!}
	{!! Form::number('import_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
