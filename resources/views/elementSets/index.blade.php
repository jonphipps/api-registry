@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ElementSets</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('elementsets.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($elementSets->isEmpty())
                <div class="well text-center">No ElementSets found.</div>
            @else
                @include('elementsets.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $elementSets])


    </div>
@endsection
