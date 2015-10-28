@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($elementPropertyHistory, ['route' => ['elementPropertyHistories.update', $elementPropertyHistory->id], 'method' => 'patch']) !!}

        @include('elementPropertyHistories.fields')

    {!! Form::close() !!}
</div>
@endsection
