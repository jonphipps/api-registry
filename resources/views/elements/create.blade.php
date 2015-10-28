@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'elements.store']) !!}

        @include('elements.fields')

    {!! Form::close() !!}
</div>
@endsection
