@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'elementsets.store']) !!}

        @include('elementsets.fields')

    {!! Form::close() !!}
</div>
@endsection
