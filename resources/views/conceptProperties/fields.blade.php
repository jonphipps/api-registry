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

<!-- Concept Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('concept_id', 'Concept Id:') !!}
	{!! Form::number('concept_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Primary Pref Label Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('primary_pref_label', 'Primary Pref Label:') !!}
	{!! Form::text('primary_pref_label', null, ['class' => 'form-control']) !!}
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

<!-- Is Concept Property Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_concept_property', 'Is Concept Property:') !!}
	{!! Form::text('is_concept_property', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
