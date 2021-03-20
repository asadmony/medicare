<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <ul class="breadcrumb breadcrumb-dividers-no-opacity    font-weight-bold text-6 justify-content-center my-5">
            
                <li class="text-transform-none text-color-dark">
                    <a href="shop-order-complete.html" class="text-decoration-none text-color-primary">Order Complete</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card w3-panel w3-border-green">
                <div class="card-body text-center">
                    <p class="text-color-dark font-weight-bold text-4-5 mb-0"><i class="fas fa-check text-color-success mr-1"></i> Thank You. Your Order has been received.</p>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between py-3 px-4 my-4">
                <div class="text-center">
                    <span>
                        Order Number <br>
                        <strong class="text-color-dark">{{$payment->order->invoice_number}}</strong>
                    </span>
                </div>
                <div class="text-center mt-4 mt-md-0">
                    <span>
                        Date <br>
                        <strong class="text-color-dark">{{$payment->trans_date}}</strong>
                    </span>
                </div>
                <div class="text-center mt-4 mt-md-0">
                    <span>
                    Email <br>
                        <strong class="text-color-dark">{{$payment->user->email}}</strong>
                    </span>
                </div>
                <div class="text-center mt-4 mt-md-0">
                    <span>
                        Total <br>
                        <strong class="text-color-dark">{{$payment->paid_amount}}</strong>
                    </span>
                </div>
                <div class="text-center mt-4 mt-md-0">
                    <span>
                    Payment Method <br>
                        <strong class="text-color-dark">{{$payment->payment_type}}</strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>