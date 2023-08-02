@extends('layouts.master')

@section('title' , 'Edit Customer' . $customer->name)

@section('content')

<div class="container">
    <h1 class="mb-5">Edit Customer</h1>
    <form action="{{ route('customers.update' , $customer->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="{{ $customer->name }}" name="name" id="name" placeholder="Name">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" value="{{ $customer->email }}" name="email" id="email" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="{{ $customer->phone }}" name="phone" id="phone" placeholder="Phone">
            <label for="phone">Phone</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" value="{{ $customer->birthday }}" name="birthday" id="birthday" placeholder="Birthday">
            <label for="birthday">Birthday</label>
        </div>
        @if ($customer->image_path)
        <img src="{{ Storage::disk('public')->url($customer->image_path) }}" class="card-img-top" alt="">
        @endif
        <div class="form-floating mb-3">
            <input type="file" class="form-control" name="image_path" id="image_path" placeholder="Image">
            <label for="image_path">Image</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="{{ $customer->note }}" name="note" id="note" placeholder="Note">
            <label for="note">Note</label>
        </div>
        <button type="submit" class="btn btn-primary">Edit Customer</button>
    </form>
</div>

@endsection
