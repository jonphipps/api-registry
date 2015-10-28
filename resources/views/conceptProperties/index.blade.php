@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ConceptProperties</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('conceptproperties.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($conceptProperties->isEmpty())
                <div class="well text-center">No ConceptProperties found.</div>
            @else
                @include('conceptProperties.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $conceptProperties])


    </div>
@endsection