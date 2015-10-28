@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'profiles.store']) !!}

        @include('profiles.fields')

    {!! Form::close() !!}
</div>
@endsection
