<div class="box box-widget" id="user-comment" style="min-height: 500px;">
	<div class="box-header with-border">
		<h3 class="box-title">Admin Conversation with User</h3>
	</div>
	<div class="box-body">
		
		<div class="w3-border w3-border-purple w3-round">
						<div class="w3-container w3-padding">




							<form  action="{{ route('admin.userCommentByAdminPost', $user) }}" method="post">
								{{csrf_field()}}


								<div class="w3-row">
  <div class="w3-col w3-right w3-container " style="width:75px">
  	<button type="submit" class="w3-btn w3-purple w3-round w3-border w3-border-purple w3-left w3-hover-purple btn-sm"> Submit</button>
  </div>
  <div class="w3-rest w3-container ">
  	<textarea name="comment" class="form-control w3-round w3-border w3-padding" id="comment" placeholder="Write New Comment"  rows="1" style="width: 100%;">{{ old('comment') }}</textarea>
  </div>
</div>
							</form>





						</div>
					</div>

	</div>
	<div class="box-footer w3-round" style="background: #ddd;margin-left: 4px;margin-right: 4px;">
		

		@foreach($user->adminUserComments() as $message)
					<div class=" border w3-white w3-round" style="padding-left: 5px;">
					 
					    <h4 class="no-margin"> {{ ($message->user_id == $message->addedby_id) ? $user->email : 'Admin' }} <small><i>Posted on {{ date('d M Y', strtotime($message->created_at)) }}</i></small></h4>
					    <p>{{ $message->comment }}</p>

					</div>

					@endforeach


	</div>
	<div class="box-footer"></div>
</div>