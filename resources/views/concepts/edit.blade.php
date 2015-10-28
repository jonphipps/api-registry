@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($concept, ['route' => ['concepts.update', $concept->id], 'method' => 'patch']) !!}

        @include('concepts.fields')

    {!! Form::close() !!}
</div>
@endsection
