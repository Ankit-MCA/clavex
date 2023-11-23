@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Create Product</h2>
            </div>
            <div class="card-body">
            <form id="createProductForm" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="company">Company Name:</label>
                        <input type="text" name="company" id="company" class="form-control" required>
                    </div>
        
                    <div class="form-group">
                        <label for="category">Product Category:</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="House Hold">House Hold</option>
                            <option value="Beauty">Beauty</option>
                            <option value="Food">Food</option>
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="skuno">SKU No:</label>
                        <input type="text" name="skuno" id="skuno" class="form-control" required>
                    </div>
        
                    <div class="form-group">
                        <label for="batch_no">Batch No:</label>
                        <input type="text" name="batch_no" id="batch_no" class="form-control" required>
                    </div>
        
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <select name="size" id="size" class="form-control" required>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
        
                    <div class="form-group">
                        <label for="qty">Quantity:</label>
                        <input type="number" name="qty" id="qty" class="form-control" required>
                    </div>
        
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
        
                    <div class="form-group">
                        <label for="stock_status">Stock Status:</label>
                        <select name="stock_status" id="stock_status" class="form-control" required>
                            <option value="In Stock">In Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Product</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function () {
        // Add validation rules to your form
        $("#createProductForm").validate({
            rules: {
                name: "required",
                company: "required",
                category: "required",
                skuno: "required",
                batch_no: "required",
                size: "required",
                qty: {
                    required: true,
                    number: true,
                },
                price: {
                    required: true,
                    number: true,
                },
                stock_status: "required",
            },
            messages: {
                // Define custom error messages if needed
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
        });
    });
</script>



@endsection
