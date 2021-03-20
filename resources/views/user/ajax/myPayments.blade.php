<div class="box-body" style="background: #ddd; min-height: 400px;">
 
            @foreach($payments as $payment)
 
                <div class="box box-widget w3-animate-zoom">
                <div class="box-body">
                  @include('user.payments.includes.paymentDetails')
                </div>
              </div>
 
            @endforeach
 
 

        

    </div>
    <div class="box-footer my-related-user-links">
        {{ $payments->links() }}
    </div>