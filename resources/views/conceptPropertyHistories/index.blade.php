@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ConceptPropertyHistories</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('conceptpropertyhistory.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($conceptPropertyHistories->isEmpty())
                <div class="well text-center">No ConceptPropertyHistories found.</div>
            @else
                @include('conceptPropertyHistories.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $conceptPropertyHistories])


    </div>
@endsection