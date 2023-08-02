@extends('layouts.master')

@section('title' , 'Add Customers')

@section('content')

    <div class="container">
        <h1 class="mb-5">Add Customer</h1>
        <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }}
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                <label for="name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                <label for="phone">Phone</label>
            </div>

            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Birthday">
                <label for="birthday">Birthday</label>
            </div>
            <div class="form-floating mb-3">
                <input type="file" class="form-control" name="image_path" id="image_path" placeholder="Image">
                <label for="image_path">Image</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="note" id="note" placeholder="Note">
                <label for="note">Note</label>
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
        </form>
    </div>

@endsection
