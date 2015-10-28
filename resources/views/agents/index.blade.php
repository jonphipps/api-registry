@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Agents</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('agents.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($agents->isEmpty())
                <div class="well text-center">No Agents found.</div>
            @else
                @include('agents.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $agents])


    </div>
@endsection