@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'vocabularies.store']) !!}

        @include('vocabularies.fields')

    {!! Form::close() !!}
</div>
@endsection
