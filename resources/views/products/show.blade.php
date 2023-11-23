<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Product List</a>
                <h1>Product Details</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>{{ $product->company }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $product->category }}</td>
                        </tr>
                        <tr>
                            <th>SKU No</th>
                            <td>{{ $product->skuno }}</td>
                        </tr>
                        <tr>
                            <th>Batch No</th>
                            <td>{{ $product->batch_no }}</td>
                        </tr>
                        <tr>
                            <th>Size</th>
                            <td>{{ $product->size }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                @if ($product->image)
                                    <img src="\assets\images\{{ $product->image }}" alt="Product Image" class="img-thumbnail img-fluid mt-2" width="100">
                                @else
                                    <p>No Image Available</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $product->qty }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <th>Stock Status</th>
                            <td>{{ $product->stock_status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
