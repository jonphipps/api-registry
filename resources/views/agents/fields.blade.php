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

<!-- Org Email Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('org_email', 'Org Email:') !!}
	{!! Form::text('org_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Org Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('org_name', 'Org Name:') !!}
	{!! Form::text('org_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Ind Affiliation Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ind_affiliation', 'Ind Affiliation:') !!}
	{!! Form::text('ind_affiliation', null, ['class' => 'form-control']) !!}
</div>

<!-- Ind Role Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ind_role', 'Ind Role:') !!}
	{!! Form::text('ind_role', null, ['class' => 'form-control']) !!}
</div>

<!-- Address1 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('address1', 'Address1:') !!}
	{!! Form::text('address1', null, ['class' => 'form-control']) !!}
</div>

<!-- Address2 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('address2', 'Address2:') !!}
	{!! Form::text('address2', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('city', 'City:') !!}
	{!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('state', 'State:') !!}
	{!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Postal Code Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postal_code', 'Postal Code:') !!}
	{!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('country', 'Country:') !!}
	{!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone', 'Phone:') !!}
	{!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Web Address Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('web_address', 'Web Address:') !!}
	{!! Form::text('web_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('type', 'Type:') !!}
	{!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
