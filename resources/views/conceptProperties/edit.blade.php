@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($conceptProperty, ['route' => ['conceptProperties.update', $conceptProperty->id], 'method' => 'patch']) !!}

        @include('conceptProperties.fields')

    {!! Form::close() !!}
</div>
@endsection
