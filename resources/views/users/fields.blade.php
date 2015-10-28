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

<!-- Last Updated Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('last_updated', 'Last Updated:') !!}
	{!! Form::date('last_updated', null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted At Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
	{!! Form::date('deleted_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Nickname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nickname', 'Nickname:') !!}
	{!! Form::text('nickname', null, ['class' => 'form-control']) !!}
</div>

<!-- Salutation Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('salutation', 'Salutation:') !!}
	{!! Form::text('salutation', null, ['class' => 'form-control']) !!}
</div>

<!-- First Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('first_name', 'First Name:') !!}
	{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('last_name', 'Last Name:') !!}
	{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Sha1 Password Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sha1_password', 'Sha1 Password:') !!}
	{!! Form::text('sha1_password', null, ['class' => 'form-control']) !!}
</div>

<!-- Salt Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('salt', 'Salt:') !!}
	{!! Form::text('salt', null, ['class' => 'form-control']) !!}
</div>

<!-- Want To Be Moderator Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('want_to_be_moderator', 'Want To Be Moderator:') !!}
	{!! Form::text('want_to_be_moderator', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Moderator Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_moderator', 'Is Moderator:') !!}
	{!! Form::text('is_moderator', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Administrator Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_administrator', 'Is Administrator:') !!}
	{!! Form::text('is_administrator', null, ['class' => 'form-control']) !!}
</div>

<!-- Deletions Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('deletions', 'Deletions:') !!}
	{!! Form::number('deletions', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('password', 'Password:') !!}
	{!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Culture Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('culture', 'Culture:') !!}
	{!! Form::text('culture', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
