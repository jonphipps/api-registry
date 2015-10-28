@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($profile, ['route' => ['profiles.update', $profile->id], 'method' => 'patch']) !!}

        @include('profiles.fields')

    {!! Form::close() !!}
</div>
@endsection
