@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ProfileProperties</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('profileProperties.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($profileProperties->isEmpty())
                <div class="well text-center">No ProfileProperties found.</div>
            @else
                @include('profileProperties.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $profileProperties])


    </div>
@endsection