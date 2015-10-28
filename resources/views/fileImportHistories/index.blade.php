@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">FileImportHistories</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('fileImportHistories.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($fileImportHistories->isEmpty())
                <div class="well text-center">No FileImportHistories found.</div>
            @else
                @include('fileImportHistories.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $fileImportHistories])


    </div>
@endsection