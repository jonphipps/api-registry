@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'conceptpropertyhistory.store']) !!}

        @include('conceptPropertyHistories.fields')

    {!! Form::close() !!}
</div>
@endsection
