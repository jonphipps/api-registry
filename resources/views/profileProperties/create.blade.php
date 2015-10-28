@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'profileProperties.store']) !!}

        @include('profileProperties.fields')

    {!! Form::close() !!}
</div>
@endsection
