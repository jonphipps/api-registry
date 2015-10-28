@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Vocabularies</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('vocabularies.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($vocabularies->isEmpty())
                <div class="well text-center">No Vocabularies found.</div>
            @else
                @include('vocabularies.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $vocabularies])


    </div>
@endsection