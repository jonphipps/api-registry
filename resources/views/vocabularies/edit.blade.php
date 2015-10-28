@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($vocabulary, ['route' => ['vocabularies.update', $vocabulary->id], 'method' => 'patch']) !!}

        @include('vocabularies.fields')

    {!! Form::close() !!}
</div>
@endsection
