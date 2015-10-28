@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Statuses</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('statuses.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($statuses->isEmpty())
                <div class="well text-center">No Statuses found.</div>
            @else
                @include('statuses.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $statuses])


    </div>
@endsection