@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'elementPropertyHistories.store']) !!}

        @include('elementPropertyHistories.fields')

    {!! Form::close() !!}
</div>
@endsection
