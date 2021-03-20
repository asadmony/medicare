
<div class="box box-widget" style="margin-bottom: 0;">
		
			<div class="box-body" style="min-height: 400px;">
				
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>SL</th>
							<th>Package ID</th>
							<th>Package Title</th>
							<th>Paid Amount</th>
							<th>Paid Currency</th>
							<th>Package Duration (Days)</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
			@if($payments->count())
			<tbody>
				@foreach($payments as $payment)
					<tr>
						<td>{{ $loop->iteration + ($payments->perPage() * ( $payments->currentPage() - 1 ))}}</td>
						<td>{{ $payment->membership_package_id }}</td>
						<td>
							{{ $payment->package_title }}
						</td>
						<td>
						{{ $payment->paid_amount }}
						</td>
						<td>{{ $payment->paid_currency }}</td>
						<td>{{ $payment->package_duration }}</td>

						<td>{{$payment->created_at->toDateString()}} ({{$payment->created_at->diffForHumans()}})</td>



			            <td style="width: 100px;"> 

              



               
                  <a title="Update User Info"  class="btn btn-xs btn-default" target="_blank" href="{{ route('admin.userDetailsEdit', $payment->user) }}"><i class="fa fa-edit"></i> User</a>
                  
                 

              </td>
						
					</tr>
				@endforeach				
			</tbody>
			@endif
					
				</table>

				
			</div>
			<div class="overlay text-center" style="display: none;">			              
              <i class="ion-load-c fa fa-spin w3-xxxlarge w3-text-deep-orange"></i>
            </div>
		</div>

		<div class="pull-right w3-small product-stock-report">
			{{$payments->appends(['user_type'=>$user_type])->render()}}
		</div>

		<br>
		<br>
		<br>