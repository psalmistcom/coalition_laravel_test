@extends('layouts.master')
@section('main-content')
    <div class="container">
        <h1>Edit Product Form</h1>
        {{ $product }}
        <form action="" id="productForm">
            <div class="show-msg"></div>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Product Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ '$product->name' }}"
                    placeholder="Enter Product Name" />
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label fw-bold">Quantity in stock</label>
                <input type="number" class="form-control" name="quantity" value="{{ 'product->quantity' }}" id="quantity"
                    placeholder="Enter quantity in stock" />
            </div>
            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Price per item</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ 'product->price' }}"
                    placeholder="Price per item" />
            </div>

            <button type="submit" id="submitBtn" class="btn btn-primary">Update</button>
            <a class="btn btn-danger" href="{{ route('product.list') }}">Cancel</a>
        </form>
    </div>
@endsection
@push('js')
    <script>
        $("#productForm").on('submit', function(e) {

            e.preventDefault();

            // clear the existing messages
            var errElement = document.getElementsByClassName('err-msg');
            if (errElement.length > 0) {
                for (var i = errElement.length - 1; i >= 0; i--) {
                    errElement[i].remove();
                }
            }

            $.ajax({
                url: "{{ route('product.store') }}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#submitBtn').attr("disabled", "disabled");
                    $('#productForm').css("opacity", ".5");
                },
                success: function(response) {

                    if (response.error) {
                        //validation fails

                        $.each(response.error, function(key, value) {
                            var inputElement = $(document).find('[name="' + key + '"]');
                            inputElement.after('<span class="err-msg">' + value[0] + '</span>');

                        });

                        $('#productForm').css("opacity", "");
                        $("#submitBtn").removeAttr("disabled");

                    } else {
                        // data inserted, display success message
                        $('#productForm').css("opacity", "");
                        $("#submitBtn").removeAttr("disabled");
                        $("#productForm")[0].reset();
                        $(".show-msg").html('<div class="alert alert-success">' + response.success +
                            '</div>');

                    }
                }

            });
        });
    </script>
@endpush
