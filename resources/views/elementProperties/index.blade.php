@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ElementProperties</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('elementProperties.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($elementProperties->isEmpty())
                <div class="well text-center">No ElementProperties found.</div>
            @else
                @include('elementProperties.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $elementProperties])


    </div>
@endsection