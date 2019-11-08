@extends('front.layouts.master')

@section('title')
    Shopping Cart
@stop

@section('content')
    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>Shopping Cart</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->


        <div class="content">
            <div class="container">
                <div class="cart">

                    @if(Session::has('warning'))
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::get('warning')}}
                        </div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::get('success')}}
                        </div>
                    @endif

                    <div class="count_items">
                        <h3>Shopping Cart ({{ auth()->check() ? \App\Model\Cart::where('user_id', auth()->user()->id)->count() : collect(Session::get('cart'))->count() }})</h3>
                    </div><!-- /.count_items -->

                    @if((!Session::has('cart') || count(Session::get('cart')) == 0) && (auth()->check() ? \App\Model\Cart::where('user_id', auth()->user()->id)->count() == 0 : true))
                    <div class="warning_empty">
                        <div class="alert alert-warning">
                            <p>
                                Shopping cart is currently empty<br>
                                Add items to your cart and view them here before you checkout.
                                <a href="{{ url('/') }}">Continue shopping!</a>
                            </p>
                        </div>
                    </div><!-- /.warning_empty -->
                    @endif

                    @if(count($products) > 0)
                    <div class="table-scrollable">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th> Name </th>
                                    <th> Description </th>
                                    <th> Price </th>
                                    <th> Quantity </th>
                                    <th> Total </th>
                                    <th>  </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    @php $item = \App\Http\Controllers\Cart::get('cart', $product->id) @endphp
                                    <td style="width: 120px;">
                                        <img src="{{ asset('images/products/'.$product->image) }}">
                                    </td>

                                    <td style="width: 150px;">
                                        <h3>{{ $product->title }}</h3>
                                    </td>

                                    <td style="width: 300px;">
                                        <p>{!! str_limit($product->description, 100) !!}</p>
                                    </td>

                                    <td style="width: 150px;">
                                        <p>{{ $product->price_discount }}</p>
                                        <span class="space-left">x</span>
                                        <input type="hidden" class="product" name="product" value="{{ $product->id }}">
                                    </td>


                                    <td style="width: 150px;">
                                        <select class="quantity form-control" name="quantity" value="1">
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '1' ? 'selected' : '' }} value="1">1</option>
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '2' ? 'selected' : '' }} value="2">2</option>
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '3' ? 'selected' : '' }} value="3">3</option>
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '4' ? 'selected' : '' }} value="4">4</option>
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '5' ? 'selected' : '' }} value="5">5</option>
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '6' ? 'selected' : '' }} value="6">6</option>
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '7' ? 'selected' : '' }} value="7">7</option>
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '8' ? 'selected' : '' }} value="8">8</option>
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '9' ? 'selected' : '' }} value="9">9</option>
                                            <option {{ (auth()->check() ? $product->cart->quantity : $item['quantity']) == '10' ? 'selected' : '' }} value="10">10</option>
                                        </select>
                                        <span>=</span>
                                    </td>

                                    <td style="width: 150px;"><p class="tot_price">{{ auth()->check() ? $product->cart->price : $item['price'] }}</p> EGP </td>

                                    <td>
                                        <form action="{{ url('cart/delete') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="item" value="{{ $product->id }}">
                                            <button class="btn btn-danger confirm"><i class="fa fa-trash"></i> Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-3 pull-right">
                        <div class="total_price">
                            <span>Total:</span>
                            <p><strong class="fin_price">{{ $total }}</strong> <span>EGP</span></p>
                        </div>

                        <div class="check_out">
                            <a href="{{ url('checkout') }}" class="btn btn-block">Proceed to checkout</a>
                        </div>
                    </div>

                        <div class="clear"></div>
                    @endif


                    <div class="loading">
                        <img src="{{ asset('images/loading.gif') }}">
                    </div>
                </div><!-- /.cart -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.quantity').change(function () {
                var quantity = $(this);
                var price = quantity.closest('tr').find('[class="price_discount"]');
                var total = quantity.closest('tr').find('[class="tot_price"]');
                if(Number.isInteger(Math.abs(parseInt(quantity.val())))) {
                    total.html(quantity.val() * price.val());

                } else {
                    $('.error_msg p span').html('Please enter an integer value in quantity');
                    $('.error_msg').slideDown(300);
                    setTimeout(function() {
                        $('.error_msg').slideUp(300);
                    }, 4000)
                }
            }) ;
        });
    </script>


    <script>
        $(document).ready(function () {

            $('.quantity').change(function () {

                console.log($(this).val());

                var quantity = $(this);
                var product = quantity.closest('tr').find('[class="product"]');
                var price = quantity.closest('tr').find('[class="tot_price"]');
                var total = $('.fin_price');

                var loading = $('.loading');

                $.ajax({
                    url: '{{ url('cart/update') }}',
                    type: 'post',
                    dataType: 'json',
                    beforeSend: function () {
                        loading.show();
                    },
                    data: {'product': product.val(), 'quantity': quantity.val(), _token: '{{csrf_token()}}'},
                    success: function (data) {
                        loading.hide();
                        if(data.status === true) {
                            price.html(data.price);
                            total.html(data.total);
                        } else {

                            if(data.messages) {
                                $('.error_msg p span').html(data.messages.product);
                            } else {
                                $('.error_msg p span').html(data.message);
                            }
                            $('.error_msg').slideDown(300);
                            setTimeout(function() {
                                $('.error_msg').slideUp(300);
                            }, 3000)
                        }
                    }
                });
            });
        });
    </script>

@stop