<dl class="dl-horizontal" style="margin-bottom: 0px;">
     <b>Status:</b> {{$payment->status}} 
     @if ($payment->status == 'pending')
         @if (Auth::check())
             
             @if (Auth::id() == $payment->user_id)
                 
                 {{-- <a class="btn btn-warning btn-sm" href="{{ route('user.paytoPaymentGateway', $payment) }}"><i class="fa fa-credit-card"></i> Pay Online</a> --}}

                 <a class="btn btn-primary btn-menu-to-container btn-sm" href="" data-url="{{ route('user.payNowEdit', $payment) }}"><i class="fa fa-edit"></i> Edit</a>

             @endif

         @endif
     @endif

     <br>
      <b>Package: </b> 
      {{ $payment->membership_package_id }} ({{$payment->package_title}}, Duration {{$payment->package_duration}} Days, {{$payment->package_currency}} {{$payment->package_amount}}) <br>
     <b>Paid Amount: </b>
     {{$payment->paid_currency}} {{$payment->paid_amount}} <br>
     <b>Payment Method: </b>
     {{$payment->payment_method}} <br>    
     <b>Payment Details: </b>
     {{$payment->payment_details}} <br>       
     <b>Admin Comment: </b>
     {{$payment->admin_comment}} <br>
     <b>Added By: </b>
     {{($payment->addedBy->username == $me->username) ? $payment->addedBy->username : 'Admin'}} <br>
     <b>Payment Update Time: </b>
     {{$payment->created_at}} <br>
</dl>