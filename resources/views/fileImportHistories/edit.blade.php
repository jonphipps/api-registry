@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($fileImportHistory, ['route' => ['fileImportHistories.update', $fileImportHistory->id], 'method' => 'patch']) !!}

        @include('fileImportHistories.fields')

    {!! Form::close() !!}
</div>
@endsection
