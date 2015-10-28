@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ElementPropertyHistories</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('elementPropertyHistories.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($elementPropertyHistories->isEmpty())
                <div class="well text-center">No ElementPropertyHistories found.</div>
            @else
                @include('elementPropertyHistories.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $elementPropertyHistories])


    </div>
@endsection