@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($profileProperty, ['route' => ['profileProperties.update', $profileProperty->id], 'method' => 'patch']) !!}

        @include('profileProperties.fields')

    {!! Form::close() !!}
</div>
@endsection
