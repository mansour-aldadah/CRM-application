@extends('layouts.master')

@section('title' , 'Customers')

@section('content')
<div class="container">
        <h1>Customers</h1>
        @if ($success)
            <div class="alert alert-success">
                {{ $success }}
            </div>
        @endif
        @if (App\Models\Customer::orderBy('created_at')->first())
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Image</th>
                    <th scope="col">Note</th>
                    <th scope="col">More</th>
                  </tr>
                </thead>
            @foreach ($customers as $customer)
                <tbody>
                    <tr>
                    <th scope="row">{{$customer->id}}</th>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->birthday}}</td>
                    <td style="width:150px"><img src="{{ Storage::disk('public')->url($customer->image_path) }}" class="card-img-top" alt=""></td>
                    <td>{{$customer->note}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            More
                            </button>
                            <ul class="dropdown-menu">
                            <li class="m-2"><a href="{{ route('customers.show' , $customer->id) }}" style="width:150px" class="btn btn-sm btn-primary">View</a></li>
                            <li class="m-2"><a href="{{ route('customers.edit' , $customer->id) }}" style="width:150px" class="btn btn-sm btn-dark">Edit</a></li>
                            <li class="m-2"><form action=" {{ route('customers.destroy' , $customer->id) }} " method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit"style="width:150px" class="btn btn-sm btn-danger">Delete</button>
                            </form></li>
                            </ul>
                        </div>
                    </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        @else
        <div class="mt-5 mb-5 mr-5 fs-3">
            You don't have any customer
        </div>

        @endif
    </div>
@endsection
