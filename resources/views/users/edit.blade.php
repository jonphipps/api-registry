@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

        @include('users.fields')

    {!! Form::close() !!}
</div>
@endsection
