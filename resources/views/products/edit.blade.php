@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Edit Product - {{ $product->name }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                    </div>

                   
            <div class="form-group">
                <label for="company">Company Name:</label>
                <input type="text" name="company" id="company" class="form-control" value="{{ $product->company }}" required>
            </div>

            <div class="form-group">
                <label for="category">Product Category:</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="House Hold" {{ $product->category == 'House Hold' ? 'selected' : '' }}>House Hold</option>
                    <option value="Beauty" {{ $product->category == 'Beauty' ? 'selected' : '' }}>Beauty</option>
                    <option value="Food" {{ $product->category == 'Food' ? 'selected' : '' }}>Food</option>
                </select>
            </div>

            <div class="form-group">
                <label for="skuno">SKU No:</label>
                <input type="text" name="skuno" id="skuno" class="form-control" value="{{ $product->skuno }}" required>
            </div>

            <div class="form-group">
                <label for="batch_no">Batch No:</label>
                <input type="text" name="batch_no" id="batch_no" class="form-control" value="{{ $product->batch_no }}" required>
            </div>

            <div class="form-group">
                <label for="size">Size:</label>
                <select name="size" id="size" class="form-control" required>
                    <option value="Small" {{ $product->size == 'Small' ? 'selected' : '' }}>Small</option>
                    <option value="Medium" {{ $product->size == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Large" {{ $product->size == 'Large' ? 'selected' : '' }}>Large</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="qty">Quantity:</label>
                <input type="number" name="qty" id="qty" class="form-control" value="{{ $product->qty }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
            </div>

                    <div class="form-group">
                        <label for="stock_status">Stock Status:</label>
                        <select name="stock_status" id="stock_status" class="form-control" required>
                            <option value="In Stock" {{ $product->stock_status == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                            <option value="Out of Stock" {{ $product->stock_status == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
