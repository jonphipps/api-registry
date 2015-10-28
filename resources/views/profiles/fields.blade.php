<!-- Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id', 'Id:') !!}
	{!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Agent Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('agent_id', 'Agent Id:') !!}
	{!! Form::number('agent_id', null, ['class' => 'form-control']) !!}
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

<!-- Child Updated At Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('child_updated_at', 'Child Updated At:') !!}
	{!! Form::date('child_updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Child Updated By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('child_updated_by', 'Child Updated By:') !!}
	{!! Form::number('child_updated_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('note', 'Note:') !!}
	{!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Uri Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('uri', 'Uri:') !!}
	{!! Form::text('uri', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('url', 'Url:') !!}
	{!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Base Domain Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('base_domain', 'Base Domain:') !!}
	{!! Form::text('base_domain', null, ['class' => 'form-control']) !!}
</div>

<!-- Token Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('token', 'Token:') !!}
	{!! Form::text('token', null, ['class' => 'form-control']) !!}
</div>

<!-- Community Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('community', 'Community:') !!}
	{!! Form::text('community', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Uri Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('last_uri_id', 'Last Uri Id:') !!}
	{!! Form::number('last_uri_id', null, ['class' => 'form-control']) !!}
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
