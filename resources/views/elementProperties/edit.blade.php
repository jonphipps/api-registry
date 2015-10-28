@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($elementProperty, ['route' => ['elementProperties.update', $elementProperty->id], 'method' => 'patch']) !!}

        @include('elementProperties.fields')

    {!! Form::close() !!}
</div>
@endsection
