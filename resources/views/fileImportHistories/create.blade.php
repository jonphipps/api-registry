@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'fileImportHistories.store']) !!}

        @include('fileImportHistories.fields')

    {!! Form::close() !!}
</div>
@endsection
