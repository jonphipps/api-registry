@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'concepts.store']) !!}

        @include('concepts.fields')

    {!! Form::close() !!}
</div>
@endsection
