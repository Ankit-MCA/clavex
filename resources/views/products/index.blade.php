@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product List</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

    @if(count($products) > 0)
        <table id="productTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>SNO.</th>
                    <th>PRODUCT NAME</th>
                    <th>COMPANY</th>
                    <th>CATEGORY</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><a href="{{ route('product.show', ['id' => $product->id]) }}" target="_blank">{{ $product->name }}</a></td>
                        <td>{{ $product->company }}</td>
                        <td>{{ $product->category }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form method="post" action="{{ route('products.destroy', $product->id) }}" style="display:inline;" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products available.</p>
    @endif
</div>
    
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Your other scripts and stylesheets -->

<!-- Your script that uses SweetAlert -->
<script>
    // Example of using SweetAlert
    function confirmDelete() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, submit the form
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
@if(session('success'))
        <script>
            // Display SweetAlert success message
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
