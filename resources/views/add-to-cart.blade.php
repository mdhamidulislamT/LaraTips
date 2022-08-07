@extends('layouts.master')

@section('title', 'Add To Cart')


@section('content')


    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Add To Cart</h1>
        </div>
        <div class="col-md-12 text-center">
            <form id="productForm" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-5 my-3">
                        <label for="warehouse">Warehouse</label>
                        <select class="form-select" id="warehouse" name="warehouse">
                            <option selected>Select Warehouse</option>
                            @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}"> {{ $warehouse->name }} - {{ $warehouse->code }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5 my-3">
                        <label for="products">Products</label>
                        <select class="form-select" id="products" name="products" onchange="addToCart(this.value)">
                            <option selected>Select Product</option>
                            @forelse ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->title }}</option>
                            @empty
                                <p>No Products</p>
                            @endforelse
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 text-center">
            <table class="table table-bordered border-primary" width="100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Stock</th>
                        <th scope="col" width="20%">Quantity</th>
                        <th scope="col" width="20%">Price</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="saleCart"></tbody>
            </table>
            <div class="row col-md-3 text-center">
                <button type="button" class="btn btn-danger" onclick="clearCart()">ClearCart</button>
            </div>
        </div>
    </div>

@endsection

@section('javascripts')

    <script>
        $(function() {
            $("#warehouse").select2({
                placeholder: "Select a warehouse",
                allowClear: true
            });
            $("#products").select2({
                placeholder: "Select a product",
                allowClear: true
            });
        });

        fetchCart();

        $('#warehouse').change(function() {
            $('#products').prop('selectedIndex', 0);
        });

        function addToCart(productId) {
            var warehouseId = $('#warehouse').val();
            var _token = $('input[name="_token"]').val();
            var fd = new FormData();
            fd.append('warehouse_id', warehouseId);
            fd.append('productId', productId);
            fd.append('quantity', 1);
            fd.append('_token', _token);
            $.ajax({
                url: "{{ route('sale.addToCart') }}",
                method: "POST",
                data: fd,
                contentType: false,
                processData: false,
                datatype: "json",
                success: function(result) {
                    fetchCart();
                },
                beforeSend: function() {
                    //$('#loading').show();
                },
                complete: function() {
                    //$('#loading').hide();
                },
                error: function(error) {
                    console.log("Error addToCart");
                }
            });
        }

        function fetchCart() {
            $.ajax({
                url: "{{ route('sale.fetchCart') }}",
                method: "get",
                success: function(result) {
                    $("#saleCart").html(result.saleCart);
                },
                beforeSend: function() {
                    //$('#loading').show();
                },
                complete: function() {
                    //$('#loading').hide();
                },
                error: function(error) {
                    console.log("Error fetchCart");
                }
            })
        }

        function calculateQuantity(quantity, productId, warehouse_id) {
            let stockQuantity = parseInt($('#stock_quantity_' + productId).text());
            if (quantity > stockQuantity || quantity <= 0) {
                $('#quantity_' + productId).val(1);
            }
            let type = "updateQty";
            updateQuantity(productId, warehouse_id, type);
        }

        function updateQuantity(productId, warehouse_id, type = false) {
            let warehouseId = warehouse_id;
            let quantity = $('#quantity_' + productId).val();
            let price = $('#price_' + productId).val();
            let stockQuantity = parseInt($('#stock_quantity_' + productId).text());
            let totalQuantity = 0;
            let totalPrice = 0;
            if (type == true) {
                if (quantity >= stockQuantity) {
                    return 0;
                }
                totalQuantity = parseInt(quantity) + 1;
                totalPrice = parseInt(price) * totalQuantity;
            } else if (type == false) {
                if (quantity <= 1) {
                    return 0;
                }
                totalQuantity = parseInt(quantity) - 1;
            } else {
                totalPrice = parseInt(price) * quantity;
                totalQuantity = quantity;
            }
            totalPrice = parseInt(price) * totalQuantity;
            $('#quantity_' + productId).val(totalQuantity);
            $('#subtotal_' + productId).text(totalPrice);
            updateCart(productId, warehouseId, totalQuantity);
            var totalAmount = 0;
            $("td[id^='subtotal']").each(function(i) {
                let subtotal = parseFloat($(this).text());
                totalAmount += subtotal;
            });
            $('#totalAmount').text(totalAmount);
        }

        function updateCart(productId, warehouse_id, quantity) {
            var _token = $('input[name="_token"]').val();
            var fd = new FormData();
            fd.append('warehouse_id', warehouse_id);
            fd.append('productId', productId);
            fd.append('quantity', quantity);
            fd.append('_token', _token);
            $.ajax({
                url: "{{ route('sale.updateCart') }}",
                method: "POST",
                data: fd,
                contentType: false,
                processData: false,
                datatype: "json",
                success: function(result) {
                    console.log("updated updateCart");
                },
                beforeSend: function() {
                    //$('#loading').show();
                },
                complete: function() {
                    //$('#loading').hide();
                },
                error: function(error) {
                    console.log("Error updateCart");
                }
            });
        }


        function removeCartProduct(id) {
            $.ajax({
                url: "{{ route('sale.removeProduct') }}",
                method: "GET",
                data: {
                    "id": id
                },
                datatype: "json",
                success: function(result) {
                    console.log(result);
                    fetchCart();
                },
                beforeSend: function() {
                    //$('#loading').show();
                },
                complete: function() {
                    //$('#loading').hide();
                },
                error: function(error) {
                    console.log("Error removeProduct");
                }
            });
        }

        function clearCart() {
            $.ajax({
                url: "{{ route('sale.clearCart') }}",
                method: "GET",
                datatype: "json",
                success: function(result) {
                    $("#saleCart").html('');
                    $('#products').prop('selectedIndex', 0);
                    $('#warehouse').prop('selectedIndex', 0);
                },
                beforeSend: function() {
                    //$('#loading').show();
                },
                complete: function() {
                    //$('#loading').hide();
                },
                error: function(error) {
                    console.log("Error clearCart");
                }
            })
        }
    </script>

@endsection
