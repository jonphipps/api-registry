@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Profiles</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('profiles.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($profiles->isEmpty())
                <div class="well text-center">No Profiles found.</div>
            @else
                @include('profiles.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $profiles])


    </div>
@endsection