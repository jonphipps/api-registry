@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Elements</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('elements.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($elements->isEmpty())
                <div class="well text-center">No Elements found.</div>
            @else
                @include('elements.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $elements])


    </div>
@endsection