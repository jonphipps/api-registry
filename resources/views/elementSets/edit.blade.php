@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($elementSet, ['route' => ['elementsets.update', $elementSet->id], 'method' => 'patch']) !!}

        @include('elementsets.fields')

    {!! Form::close() !!}
</div>
@endsection
