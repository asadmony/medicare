<div class="container">

    <div class="row">
        <div class="col">

            <div class="featured-boxes">
                <div class="row">
                    <div class="col-md-8 col-sm-6">
                        <div class="featured-box featured-box-primary text-left mt-2">
                            <div class="box-content">
                                {{-- <form method="post" action=""> --}}
                                <table class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">
                                                &nbsp;
                                            </th>
                                            <th class="product-thumbnail">
                                                &nbsp;
                                            </th>
                                            <th class="product-name" style="width: 50%">
                                                Package
                                            </th>
                                            <th class="product-price" style="width: 50%">
                                                Price
                                            </th>
                                            {{-- <th class="product-quantity">
                                                Quantity
                                            </th> --}}
                                            <th class="product-subtotal">
                                                Total
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_table_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="#">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="shop-product-sidebar-left.html">
                                                    {{-- <img width="100" height="100" alt="" class="img-fluid" src="img/products/product-grey-1.jpg"> --}}
                                                </a>
                                            </td>
                                            <td class="product-name" style="color: blue;">
                                                {{ucfirst($item->order_for)}}
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">£{{$item->total_price}}</span>
                                            </td>
                                            
                                            <td class="product-subtotal">
                                                <span class="amount">£{{$item->total_price}}</span>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="pin-wrapper" style="height: 462px;"><div class="card border-width-3 border-radius-0 border-color-hover-dark sticky-active" data-plugin-sticky="" data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}" style="width: 350px; left: 879.5px; top: 85px; position: fixed;">
                                <form action="{{route('welcome.paymentDone',$item)}}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <h4 class="font-weight-bold text-uppercase text-4 mb-3">Cart Totals</h4>
                                        <table class="shop_table cart-totals mb-4">
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <td class="border-top-0">
                                                        <strong class="text-color-dark">Subtotal</strong>
                                                    </td>
                                                    <td class="border-top-0 text-right">
                                                        <strong><span class="amount font-weight-medium">£{{$item->total_price}}</span></strong>
                                                    </td>
                                                </tr>
                                                <tr class="shipping">
                                                    <td colspan="2">
                                                        <strong class="d-block text-color-dark mb-2">Choose Payment option</strong>
                                                        <div class="d-flex flex-column">
                                                            <label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method1">
                                                                <input id="shipping_method1" type="radio" class="mr-2" name="payment_by" value="paypal" checked="">
                                                                Paypal
                                                            </label>
                                                            <label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method2">
                                                            <input id="shipping_method2" type="radio" class="mr-2" name="payment_by" value="hand cash">
                                                            Hand Cash
                                                            </label>
                                                                
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="total">
                                                    <td>
                                                        <strong class="text-color-dark text-3-4">Total</strong>
                                                    </td>
                                                    <td class="text-right">
                                                        <strong class="text-color-dark"><span class="amount text-color-dark text-5">£{{$item->total_price}}</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <button class="btn btn-dark btn-modern btn-block text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">
                                        Proceed to Payment <i class="fas fa-arrow-right ml-2"></i>
                                    </button>
                                    {{-- <a href="shop-checkout.html" class="btn btn-dark btn-modern btn-block text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">Proceed to Payment <i class="fas fa-arrow-right ml-2"></i></a> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>