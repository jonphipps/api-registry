@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'prefixes.store']) !!}

        @include('prefixes.fields')

    {!! Form::close() !!}
</div>
@endsection
