@extends('layouts.master')
@section('main-content')
    <div class="container">
        <h1>Product List</h1>
        <div class="text-end mb-5"><a class="btn btn-success" href="{{ route('product.create') }}">+ New Product</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <th>Id</th>
                <th>Product Name</th>
                <th>Quantity in stock</th>
                <th>Price per item</th>
                <th>Datetime submitted</th>
                <th>Total value number</th>
            </thead>
            <tbody>
                @forelse ($products as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->item_name }}</td>
                        <td>{{ $row->quantity }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->price }}</td>
                    </tr>
                @empty
                    <tr>
                        <td>No Items to display</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
