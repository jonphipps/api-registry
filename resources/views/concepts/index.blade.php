@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Concepts</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('concepts.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($concepts->isEmpty())
                <div class="well text-center">No Concepts found.</div>
            @else
                @include('concepts.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $concepts])


    </div>
@endsection