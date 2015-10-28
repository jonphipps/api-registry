<!-- Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id', 'Id:') !!}
	{!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Skos Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('skos_id', 'Skos Id:') !!}
	{!! Form::number('skos_id', null, ['class' => 'form-control']) !!}
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

<!-- Created By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('created_by', 'Created By:') !!}
	{!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('updated_by', 'Updated By:') !!}
	{!! Form::number('updated_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('deleted_by', 'Deleted By:') !!}
	{!! Form::number('deleted_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Profile Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('profile_id', 'Profile Id:') !!}
	{!! Form::number('profile_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Skos Parent Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('skos_parent_id', 'Skos Parent Id:') !!}
	{!! Form::number('skos_parent_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Label Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('label', 'Label:') !!}
	{!! Form::text('label', null, ['class' => 'form-control']) !!}
</div>

<!-- Definition Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('definition', 'Definition:') !!}
	{!! Form::textarea('definition', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('comment', 'Comment:') !!}
	{!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('type', 'Type:') !!}
	{!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Uri Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('uri', 'Uri:') !!}
	{!! Form::text('uri', null, ['class' => 'form-control']) !!}
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

<!-- Note Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('note', 'Note:') !!}
	{!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Order Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('display_order', 'Display Order:') !!}
	{!! Form::number('display_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Export Order Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('export_order', 'Export Order:') !!}
	{!! Form::number('export_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Picklist Order Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('picklist_order', 'Picklist Order:') !!}
	{!! Form::number('picklist_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Examples Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('examples', 'Examples:') !!}
	{!! Form::text('examples', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Required Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_required', 'Is Required:') !!}
	{!! Form::text('is_required', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Reciprocal Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_reciprocal', 'Is Reciprocal:') !!}
	{!! Form::text('is_reciprocal', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Singleton Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_singleton', 'Is Singleton:') !!}
	{!! Form::text('is_singleton', null, ['class' => 'form-control']) !!}
</div>

<!-- Is In Picklist Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_in_picklist', 'Is In Picklist:') !!}
	{!! Form::text('is_in_picklist', null, ['class' => 'form-control']) !!}
</div>

<!-- Is In Export Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_in_export', 'Is In Export:') !!}
	{!! Form::text('is_in_export', null, ['class' => 'form-control']) !!}
</div>

<!-- Inverse Profile Property Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('inverse_profile_property_id', 'Inverse Profile Property Id:') !!}
	{!! Form::number('inverse_profile_property_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Is In Class Picklist Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_in_class_picklist', 'Is In Class Picklist:') !!}
	{!! Form::text('is_in_class_picklist', null, ['class' => 'form-control']) !!}
</div>

<!-- Is In Property Picklist Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_in_property_picklist', 'Is In Property Picklist:') !!}
	{!! Form::text('is_in_property_picklist', null, ['class' => 'form-control']) !!}
</div>

<!-- Is In Rdf Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_in_rdf', 'Is In Rdf:') !!}
	{!! Form::text('is_in_rdf', null, ['class' => 'form-control']) !!}
</div>

<!-- Is In Xsd Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_in_xsd', 'Is In Xsd:') !!}
	{!! Form::text('is_in_xsd', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Attribute Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_attribute', 'Is Attribute:') !!}
	{!! Form::text('is_attribute', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Language Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('has_language', 'Has Language:') !!}
	{!! Form::text('has_language', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Object Prop Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_object_prop', 'Is Object Prop:') !!}
	{!! Form::text('is_object_prop', null, ['class' => 'form-control']) !!}
</div>

<!-- Is In Form Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_in_form', 'Is In Form:') !!}
	{!! Form::text('is_in_form', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
