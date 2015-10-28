@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'elementProperties.store']) !!}

        @include('elementProperties.fields')

    {!! Form::close() !!}
</div>
@endsection
