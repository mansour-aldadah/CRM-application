@extends('layouts.master')

@section('title' , $customer->name)

@section('content')
    <div class="container">
        <h1> {{ $customer->name }} (#{{ $customer->id }})</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="border rounded p-3 text-center">
                    <span class="text-success fs-2"> {{ $customer->phone }} </span>
                </div>
            </div>
            <div class="col-md-9"></div>
        </div>
    </div>
@endsection
