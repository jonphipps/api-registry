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

<!-- Map Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('map', 'Map:') !!}
	{!! Form::textarea('map', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_id', 'User Id:') !!}
	{!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Vocabulary Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('vocabulary_id', 'Vocabulary Id:') !!}
	{!! Form::number('vocabulary_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Schema Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('schema_id', 'Schema Id:') !!}
	{!! Form::number('schema_id', null, ['class' => 'form-control']) !!}
</div>

<!-- File Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('file_name', 'File Name:') !!}
	{!! Form::text('file_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Source File Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('source_file_name', 'Source File Name:') !!}
	{!! Form::text('source_file_name', null, ['class' => 'form-control']) !!}
</div>

<!-- File Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('file_type', 'File Type:') !!}
	{!! Form::text('file_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Batch Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('batch_id', 'Batch Id:') !!}
	{!! Form::number('batch_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Results Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('results', 'Results:') !!}
	{!! Form::textarea('results', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Processed Count Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('total_processed_count', 'Total Processed Count:') !!}
	{!! Form::number('total_processed_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Error Count Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('error_count', 'Error Count:') !!}
	{!! Form::number('error_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Success Count Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('success_count', 'Success Count:') !!}
	{!! Form::number('success_count', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
