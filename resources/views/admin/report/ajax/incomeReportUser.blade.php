
<div class="box box-widget" style="margin-bottom: 0;">
		
			<div class="box-body" style="min-height: 400px;">
				
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>SL</th>
							<th>ID</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>Link</th>
							<th>Created at</th>
							<th>Action</th> 
						</tr>
					</thead>
			@if($users->count())
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $loop->iteration + ($users->perPage() * ( $users->currentPage() - 1 ))}}</td>
						<td>{{ $user->id }}</td>
						<td>
						{{ $user->name }}
						</td>
						<td>{{ $user->mobile }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<a title="{{$user->name}}" class="btn btn-default btn-xs" href="{{url('/', $user->username)}}" target="_blank"><b><i class="fa fa-external-link"></i></b></a>
						</td>

						<td>{{$user->created_at->toDateString()}} ({{$user->created_at->diffForHumans()}})</td>



			            <td style="width: 100px;"> 

              



               
                  <a title="Update User Info"  class="btn btn-xs btn-default" target="_blank" href="{{ route('admin.userDetailsEdit', $user) }}"><i class="fa fa-edit"></i></a>
                  
                 

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
			{{$users->appends(['user_type'=>$user_type])->render()}}
		</div>

		<br>
		<br>
		<br>