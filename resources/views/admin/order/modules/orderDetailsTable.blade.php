
<table class="table table-bordered text-center">
    
    <thead>
        <tr>
            <th>SL</th>
            <th>Invoice Number</th>
            <th>Order For</th>
            <th>Order Amount</th>
            <th>Paid Amount</th>
            <th>Purchases By</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = (($orders->currentPage() - 1) * $orders->perPage() + 1); ?>
        @foreach($orders as $order)
        <tr>
            <td>{{ $i }}</td>
            <td>{{$order->invoice_number}}</td>
            <td>{{$order->order_for}}</td>
            <td>{{$order->grand_total}}</td>
            <td>{{$order->total_paid}}</td>
            <td>{{ $order->email }}</td>
            <td>{{ now()->parse($order->created_at)->format('d-M-Y h:m A') }}</td>
            
            <td>                                
                
                <div class="btn-group">
                    
                    <a class="btn btn-xs btn-warning" href="{{ route('admin.orderDetails',[ 'order'=>$order, 'type'=>$order->order_status]) }}">Details</a>
                    
                    
                </div>
            </td>
        </tr>
        <?php $i++; ?>
        @endforeach
    </tbody>
</table>

<div class="card-footer text-center">
    {{$orders->render()}}
</div>