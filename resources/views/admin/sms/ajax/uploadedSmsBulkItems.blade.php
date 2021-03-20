

<div class="box box-widget draft-bulk-{{$bulk->id}}">
	<div class="box-header with-border">
		<h3 class="box-title">Sent SMS to Contacts of <b class="label label-default">{{$bulk->title}}</b></h3>

		<div class="box-tools pull-right">
			<div class="btn-group btn-group-xs">
 
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
 

              <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red uploaded-contact-file-delete" href="{{route('admin.uploadedContactFileDelete',$bulk)}}" data-url="">Confirm</a></li>
            </ul>
          </div>
		</div>

		

	</div>
	<div class="box-body">

		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<b>Contacts:</b> <br>
						<div class="row">
							@foreach($bulk->contacts->chunk($bulk->contacts->count()/2) as $contactsHalf)

							<div class="col-sm-6">
								@foreach($contactsHalf as $contact)

								{{$contact->mobile}} <br>

								@endforeach
							</div>

							@endforeach
						</div>
					</div>
				</div>

			</div>
			<div class="col-sm-8">
				<form class="form-horizontal form-sms-to-contact-send" method="post"  action="">        
 

					<div class="form-group {{ $errors->has('sender_number') ? ' has-error' : '' }}">
						<label for="sender_number" class="col-sm-3 control-label">Sender Number <br> (eg. 01680000000)</label>
						<div class="col-sm-9">
							<input type="text" value="{{ $bulk->sent_from}}" name="sender_number" class="form-control" id="sender_number" placeholder="Sender Number" readonly>
							<span>Your Mobile Number (Sender Number)</span><br>
							@if ($errors->has('sender_number'))
							<span class="help-block">
								<strong>{{ $errors->first('sender_number') }}</strong>
							</span>
							@endif
						</div>
					</div> 

					<div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
						<label for="message" class="col-sm-3 control-label">Message <br>(145 character)</label>
						<div class="col-sm-9">
							<textarea class="form-control" readonly rows="5" name="message" placeholder="Message">{{substr($bulk->message,0,-15)}}</textarea>
							@if ($errors->has('message'))
							<span class="help-block">
								<strong>{{ $errors->first('message') }}</strong>
							</span>
							@endif
						</div>
					</div>


					


 
						
						<div class="pull-right">
							<a class="btn btn-primary" href="{{route('admin.uploadedContactFileResend', $bulk)}}">Resend</a>
						</div>
 
				</form>
			</div>
		</div>


	</div>
</div>