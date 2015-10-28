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

<!-- Schema Property Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('schema_property_id', 'Schema Property Id:') !!}
	{!! Form::number('schema_property_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Profile Property Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('profile_property_id', 'Profile Property Id:') !!}
	{!! Form::number('profile_property_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Schema Property Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_schema_property', 'Is Schema Property:') !!}
	{!! Form::text('is_schema_property', null, ['class' => 'form-control']) !!}
</div>

<!-- Object Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('object', 'Object:') !!}
	{!! Form::textarea('object', null, ['class' => 'form-control']) !!}
</div>

<!-- Related Schema Property Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('related_schema_property_id', 'Related Schema Property Id:') !!}
	{!! Form::number('related_schema_property_id', null, ['class' => 'form-control']) !!}
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

<!-- Is Generated Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_generated', 'Is Generated:') !!}
	{!! Form::text('is_generated', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
