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

<!-- Schema Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('schema_id', 'Schema Id:') !!}
	{!! Form::number('schema_id', null, ['class' => 'form-control']) !!}
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

<!-- Is Subproperty Of Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_subproperty_of', 'Is Subproperty Of:') !!}
	{!! Form::number('is_subproperty_of', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Uri Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('parent_uri', 'Parent Uri:') !!}
	{!! Form::text('parent_uri', null, ['class' => 'form-control']) !!}
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

<!-- Domain Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('domain', 'Domain:') !!}
	{!! Form::text('domain', null, ['class' => 'form-control']) !!}
</div>

<!-- Orange Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('orange', 'Orange:') !!}
	{!! Form::text('orange', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Deprecated Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_deprecated', 'Is Deprecated:') !!}
	{!! Form::text('is_deprecated', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('url', 'Url:') !!}
	{!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Lexical Alias Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('lexical_alias', 'Lexical Alias:') !!}
	{!! Form::text('lexical_alias', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
