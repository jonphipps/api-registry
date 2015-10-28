@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'agents.store']) !!}

        @include('agents.fields')

    {!! Form::close() !!}
</div>
@endsection
