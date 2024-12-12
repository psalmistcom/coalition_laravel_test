@extends('layouts.master')
@section('main-content')
    <div class="container">
        <h1>Product List</h1>
        <div class="text-end mb-5"><a class="btn btn-success" href="{{ route('product.create') }}">+ New Product</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <th>Product Name</th>
                <th>Quantity in stock</th>
                <th>Price per item</th>
                <th>Datetime submitted</th>
                <th>Total value number</th>
                <th>Action</th>
            </thead>
            <tbody>
                @forelse ($products as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->quantity }}</td>
                        <td>{{ '$' . number_format($row->price, 2) }}</td>
                        <td>{{ date('F d, Y,  H:i', strtotime($row->created_at)) }}</td>
                        <td>{{ '$' . number_format($row->price * $row->quantity, 2) }}</td>
                        <td>
                            <a href="{{ route('product.edit', $row->id) }}">Edit</a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td>No Items to display</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <div>
                    @foreach ($products as $item)
                        {{ $totalsum = $item->price * $item->quantity }}
                    @endforeach
                </div>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $totalsum }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
