  @include('alerts')
  <div class="box box-widget quick-sms-file-{{$bulk->id}}">
  <div class="box-header with-border">
    <h3 class="box-title">Quick SMS</h3>
    

    <div class="box-tools pull-right">
			<div class="btn-group btn-group-xs">
 
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
 

              <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red quick-sms-file-delete " href="{{route('admin.quickSmsDraftDelete',$bulk)}}" data-url="">Confirm</a></li>
            </ul>
          </div>
		</div>

  </div>
  <div class="box-body">
    <form class="form-horizontal" method="post"  action="">        

                {{csrf_field()}}

                <div class="form-group {{ $errors->has('recipients') ? ' has-error' : '' }}">
                  <label for="recipients" class="col-sm-3 control-label">Recipients <br>(Separate by Comma)</label>
                  <div class="col-sm-9">
                    <?php $contacts = ''; ?>
                    @foreach($bulk->contacts as $contact)
                    <?php $contacts = $contacts.$contact->mobile.','; ?>
                    @endforeach
                    <textarea class="form-control" readonly name="recipients" placeholder="Type Recipients With Comma">{{$contacts}}</textarea>
                    @if ($errors->has('recipients'))
                      <span class="help-block">
                          <strong>{{ $errors->first('recipients') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group {{ $errors->has('sender_number') ? ' has-error' : '' }}">
                  <label for="sender_number" class="col-sm-3 control-label">Sender Number <br> (eg. 01680000000)</label>
                  <div class="col-sm-9">
                    <input type="text" readonly value="{{ $bulk->sent_from}}" name="sender_number" class="form-control" id="sender_number" placeholder="Sender Number">
                    <span>Your Masking Number (Sender Number)</span><br>
                    @if ($errors->has('sender_number'))
                      <span class="help-block">
                          <strong>{{ $errors->first('sender_number') }}</strong>
                      </span>
                  @endif
                  </div>
                </div> 

                <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
                  <label for="message" class="col-sm-3 control-label">Message <br>(160 characters)</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" readonly rows="5" name="message" placeholder="Message">{{$bulk->message}}</textarea>
                    @if ($errors->has('message'))
                      <span class="help-block">
                          <strong>{{ $errors->first('message') }}</strong>
                      </span>
                  @endif
                  </div>
                </div>


                <div class="pull-right">
									<a class="btn btn-primary" href="{{route('admin.quickSmsBulkItemsResend', $bulk)}}">Resend</a>
								</div>

                


 

            </form>
    
  </div>
</div>