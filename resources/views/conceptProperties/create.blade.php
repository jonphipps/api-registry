@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'conceptProperties.store']) !!}

        @include('conceptProperties.fields')

    {!! Form::close() !!}
</div>
@endsection
