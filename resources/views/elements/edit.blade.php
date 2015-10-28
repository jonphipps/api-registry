@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($element, ['route' => ['elements.update', $element->id], 'method' => 'patch']) !!}

        @include('elements.fields')

    {!! Form::close() !!}
</div>
@endsection
