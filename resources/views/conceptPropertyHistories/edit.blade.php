@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($conceptPropertyHistory, ['route' => ['conceptpropertyhistory.update', $conceptPropertyHistory->id], 'method' => 'patch']) !!}

        @include('conceptPropertyHistories.fields')

    {!! Form::close() !!}
</div>
@endsection
