@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($agent, ['route' => ['agents.update', $agent->id], 'method' => 'patch']) !!}

        @include('agents.fields')

    {!! Form::close() !!}
</div>
@endsection
