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

<!-- Child Updated At Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('child_updated_at', 'Child Updated At:') !!}
	{!! Form::date('child_updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Child Updated User Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('child_updated_user_id', 'Child Updated User Id:') !!}
	{!! Form::number('child_updated_user_id', null, ['class' => 'form-control']) !!}
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

<!-- Profile Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('profile_id', 'Profile Id:') !!}
	{!! Form::number('profile_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ns Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ns_type', 'Ns Type:') !!}
	{!! Form::text('ns_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Prefixes Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('prefixes', 'Prefixes:') !!}
	{!! Form::textarea('prefixes', null, ['class' => 'form-control']) !!}
</div>

<!-- Languages Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('languages', 'Languages:') !!}
	{!! Form::textarea('languages', null, ['class' => 'form-control']) !!}
</div>

<!-- Repo Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('repo', 'Repo:') !!}
	{!! Form::text('repo', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
