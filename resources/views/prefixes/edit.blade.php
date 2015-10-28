@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($prefix, ['route' => ['prefixes.update', $prefix->id], 'method' => 'patch']) !!}

        @include('prefixes.fields')

    {!! Form::close() !!}
</div>
@endsection
