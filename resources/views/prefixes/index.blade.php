@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Prefixes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('prefixes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($prefixes->isEmpty())
                <div class="well text-center">No Prefixes found.</div>
            @else
                @include('prefixes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $prefixes])


    </div>
@endsection