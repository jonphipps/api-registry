@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'users.store']) !!}

        @include('users.fields')

    {!! Form::close() !!}
</div>
@endsection
