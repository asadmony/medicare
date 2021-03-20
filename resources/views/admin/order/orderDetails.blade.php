@extends('admin.layouts.adminMaster')
@section('title')
<title>Order Details of ID: {{ $order->id }}</title>
@endsection
@push('css')
@endpush
@section('content')
<br>
<!-- Main content -->
<section class="content w3-white">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
        
                @include('alerts.alerts')
        
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>From:</h5>
                            <address>
                                <strong>{{config('app.name')}}</strong><br>
                                abc,abcdefg<br>
                                London, United Kingdom<br>
                                <strong title="Phone">Phone:</strong> (123) 456-789
                            </address>
                        </div>
        
                        <div class="col-sm-6 text-right">
                            <h4>Invoice Number</h4>
                            <h4 class="text-navy">{{ $order->invoice_number }}</h4>
                            <span>To:</span>
                            <address>
                                <strong>{{ $order->name }} </strong><br>
                                {{ $order->address }}
                                <br>
                                <abbr title="Phone">Mobile:</abbr> {{ $order->mobile }} <br>
                                <abbr title="Email">Email:</abbr>
                                {{ $order->email }}
                            </address>
                            <p>
                                <span><strong>Invoice Date:</strong> {{ $order->created_at->toDateString() }}</span><br/>
                                <span><strong>{{ ucfirst($order->order_status) }} Date:</strong> 
                                    @if($orderS = $order->order_status)
                                    {{ $order->created_at->toDateString() }}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
        
                    <div class="table-responsive m-t">
                        <table class="table invoice-table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{$orderItem->order_for}}
                                    </td>
                                    <td>
                                        {{$orderItem->total_price}}
                                    </td>
                                    <td>
                                        {{$orderItem->total_price}}
                                    </td>
                                </tr>   
                            </tbody>
                        </table>
                    </div>
                    <!-- /table-responsive -->
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header w3-blue">
                      <h3 class="card-title ">
                              Manage Product
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Item</th>
                            <th>User Name</th>
                            <th style="width: 25%">Order Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>                                        {{$orderItem->order_for}}
                            </td>
                            <td>
                                {{ $order->name }}
                            </td>
                            <td>
                                <form class="form-inline" method="post" action="{{ route('admin.orderItemOrderStatusUpdate',$orderItem) }}">

                                    @csrf
    
                                    <div class="input-group mb-3 input-group-sm">
    
                                      <select class="form-control" name="order_status" id="order_status"
                                      {{$order->order_status == 'delivered' ? 'disabled' : ''}}>
    
                                        <option {{ $order->order_status == 'pending' ? 'selected' : '' }}>pending</option>

                                        <option {{ $order->order_status == 'confirmed' ? 'selected' : '' }}>confirmed</option>

                                        {{-- <option {{ $order->order_status == 'processing' ? 'selected' : '' }}>processing</option> --}}
                                        
                                        <option {{ $order->order_status == 'delivered' ? 'selected' : '' }}>delivered</option>
                                        <option {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>cancelled</option>
                                        
    
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>
                                </div>
    
                            </form>
                            </td>
                          </tr>
                          <tr>
                              <td></td>
                              <td></td>
                              <td>
                                Payment Status:    <span class="badge badge-info"><b>
                                    {{ $order->payment_status }}
                                </b></span>
                              </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header w3-blue">
                      <h3 class="card-title ">
                            Manage Payment
                      </h3>
                    </div>
                    <div class="card-body p-0">
                        <form action="{{route('admin.orderPaymentSubmit',$order)}}" method="POST">
                            @csrf
                            <div class="w3-round w3-white p-2">


                                <div class="form-group">
                                    <label>Paid Amount</label>
                                    <input type="number" name="paid_amount" value="{{ $order->total_due }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Payment Method</label>
                                    <select class="form-control" name="payment_type">
                                        <option value="">Select Option</option>
                                        <option value="Hand Cash">Hand Cash</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Mobile/Account No</label>
                                    <input class="form-control" type="text" name="account_number" id="account_number">
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <input type="text" name="note" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm" type="submit">Add Payment</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header w3-blue">
                        <h3 class="card-title">Manual Payment</h3>
                    </div>
                    <div class="card-body">
                        <div class="w3-round w3-white p-2">

                            @foreach($order->payments as $payment)
        
                            @if($payment->payment_status == 'pending')                           
                            
                            <div class="border rounded pl-3 w3-yellow">
                                <h5>Pending Payment</h5> 
                            </div>
                            <br>
        
                                    <form method="post" action="{{ route('admin.orderPaymentUpdate',$payment) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Paid Amount</label>
                                                        <input type="text" name="paid_amount" value="{{ $payment->paid_amount }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                
                                                                    <div class="form-group">
                                                    <label>Payment Method</label>
                                                    <select class="form-control" name="payment_type">
                                                        <option value="">Select Option</option>
                                                        <option  {{ $payment->payment_type == 'cash' ? 'selected' : '' }}  value="cash">Hand Cash</option>
                                                        
                                                        <option  {{ $payment->payment_type == 'bank' ? 'selected' : '' }}  value="bank">Bank Transfer</option>
        
                                                        <option  {{ $payment->payment_type == 'cheque' ? 'selected' : '' }}  value="cheque">Cheque</option>
                                                    </select>
                                                </div>
        
                                            </div>
                                            <div class="col-sm-6">
                                                
                                                <div class="form-group">
                                                    <label>Bank/Mobile Number</label>
                                                    <input type="text" name="account_number" value="{{ $payment->account_number }}" class="form-control">
                                                </div>                   
        
                                            </div>
                                            <div class="col-sm-6">
                                                
                                                <div class="form-group">
                                                    <label>Note</label>
                                                    <input type="text" name="note" value="{{ $payment->note }}" class="form-control">
                                                </div>
        
        
                                            </div>
                                            <div class="col-sm-8"></div>
        
                                            <div class="col-sm-2">
                                                <a href="">
                                                    <button class="btn btn-success" type="submit">Update</button>
                                                </a>
                                            </div>
                                            <div class="col-sm-2">
                                                <a onclick="confirm('Do you really want to delete this payment?');" href="{{route('admin.orderpaymentDelete',$payment)}}" class="btn btn-danger">
                                                    Delete
                                                </a>
                                            </div>
                                            {{-- <div class="col-sm-3"></div> --}}
                                        </div>
        
                                        <br>
        
                                        {{-- <div class="float-right">
                                            
                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                        </div> --}}
                                        
                                    </form>
                            
        
        
        
                            @elseif($payment->payment_status =='completed')
                            
                            
                            {{-- <b>Completed Payment</b> <br> --}}
                            @if ($loop->first)
                            <div class="border rounded pl-3 w3-green">
                                <h5>Completed Payment</h5>
                            </div>
                            @endif
                            
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <th>
                                            Paid amount
                                        </th>
                                        <td>:</td>
                                        <td>
                                            {{$payment->paid_amount}}
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>
                                            Payment type
                                        </th>
                                        <td>:</td>
                                        <td>
                                            {{$payment->payment_type}}
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>
                                            Mobile/account no
                                        </th>
                                        <td> : </td>
                                        <td>
                                            {{$payment->account_number}}
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>
                                            Note
                                        </th>
                                        <td>:</td>
                                        <td>
                                            {{$payment->note}}
                                        </td>
                                    </tr>    
                                </table>    
                            </div>
        
                            @endif       
        
                            @endforeach
        
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    @if($type == 'delivered')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header w3-blue">
                        <h3 class="card-title">Taken Packages Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="w3-table w3-bordered w3-centered">
                            <tr>
                                <th>Course level</th>
                                <th>No of courses</th>
                                <th>No of persons</th>
                                <th>No of attempts</th>
                                <th>No of credits</th>
                                <th>Duration</th>
                                <th>Package for</th>
                                <th>package type</th>
                                <th>Expired date</th>

                            </tr>
                            <tr>
                                <td>
                                    {{$orderItem->takenpackage->course_level}}
                                </td>
                                <td>
                                    {{$orderItem->takenpackage->no_of_courses}}
                                </td>
                                <td>
                                    {{$orderItem->takenpackage->no_of_persons}}
                                </td>
                                <td>
                                    {{$orderItem->takenpackage->no_of_attempts}}
                                </td><td>
                                    {{$orderItem->takenpackage->no_of_credits}}
                                </td><td>
                                    {{$orderItem->takenpackage->duration}} Days
                                </td><td>
                                    {{$orderItem->takenpackage->package_for}}
                                </td><td>
                                    {{$orderItem->takenpackage->package_type}}
                                </td>
                                <td>
                                    {{$orderItem->takenpackage->expired_date}} 
                                </td>
                              </tr>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>

@endsection
@push('js')
@endpush
