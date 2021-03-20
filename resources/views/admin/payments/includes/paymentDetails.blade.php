<dl class="dl-horizontal" style="margin-bottom: 0px;">
     <dt>User</dt>
     <dd>{{$payment->user->name}} ({{$payment->user->email}})</dd>
     <dt>Status</dt>
     <dd>{{$payment->status}}</dd>
     <dt>Package</dt>
     <dd>{{ $payment->membership_package_id }} ({{$payment->package_title}}, Duration {{$payment->package_duration}} Days, {{$payment->package_currency}} {{$payment->package_amount}})</dd>
     <dt>Paid Amount</dt>
     <dd>{{$payment->paid_currency}} {{$payment->paid_amount}}</dd>
     <dt>Payment Method</dt>
     <dd>{{$payment->payment_method}}</dd>    
     <dt>Payment Details</dt>
     <dd>{{$payment->payment_details}}</dd>       
     <dt>Admin Comment</dt>
     <dd>{{$payment->admin_comment}}</dd>
     <dt>Added By</dt>
     <dd>{{$payment->addedBy->email}}</dd>
     <dt>Payment Update Time</dt>
     <dd>{{$payment->created_at}}</dd>
</dl>