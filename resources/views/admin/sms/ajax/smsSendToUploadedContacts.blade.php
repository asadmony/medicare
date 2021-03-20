<div class="alert alert-success alert-dismissable fade in success-js-alert" style="display: none;">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success! </strong> <span class="js-alert-success-data"></span>.
</div>

<div class="alert alert-danger alert-dismissable fade in error-js-alert" style="display: none;">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Oops! </strong> <span class="js-alert-error-data"></span>.
</div>

  <div class="box box-widget draft-bulk-{{$bulk->id}}">
  <div class="box-header with-border">
    <h3 class="box-title">Send SMS to Contacts of <b class="label label-default">{{$bulk->title}}</b></h3>
  </div>
  <div class="box-body">
    <form class="form-horizontal form-sms-to-contact-send" method="post"  action="{{route('admin.uploadedContactDraftSendPost',$bulk)}}">        

                {{csrf_field()}}

                <div class="form-group {{ $errors->has('recipients') ? ' has-error' : '' }}">
                  <label for="recipients" class="col-sm-3 control-label">Recipients <br>(Separate by Comma)</label>
                  <div class="col-sm-9">
                    <?php $contacts = ''; ?>
                    @foreach($bulk->contacts as $contact)
                    <?php $contacts = $contacts.$contact->mobile.','; ?>
                    @endforeach
                    <textarea class="form-control" name="recipients" placeholder="Type Recipients With Comma">{{$contacts}}</textarea>
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
                    <input type="text" value="{{ $bulk->sent_from}}" name="sender_number" class="form-control" id="sender_number" placeholder="Sender Number">
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
                    <textarea class="form-control" rows="5" name="message" placeholder="Message">{{substr($bulk->message,0,-15)}}</textarea>
                    @if ($errors->has('message'))
                      <span class="help-block">
                          <strong>{{ $errors->first('message') }}</strong>
                      </span>
                  @endif
                  </div>
                </div>


                <div class="form-group{{ $errors->has('accept') ? ' has-error' : '' }}"> 
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><input type="checkbox" name="accept" required>  I accept terms & conditions. <a href="#">See Details</a></label>
                      @if ($errors->has('accept'))
                      <span class="help-block">
                          <strong>{{ $errors->first('accept') }}</strong>
                      </span>
                  @endif
                    </div>
                  </div>
                </div>
            

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="reset" class="btn btn-default">Cancel</button>

                  <button type="submit" class="btn btn-primary pull-right">Send</button>

                  </div>
                </div>


                <div class="col-sm-offset-3 col-sm-9">
                  <p><b>Tip: </b> Mentioning your name in the SMS will help the receiver to recognize you.</p>
                  <p><b>Note: </b>Note: According to the LYNK Rules and Regulations, Abusive, Threatening or Illegal SMS is a Crime and can be prosecuted in the court of law. Please note your IP Address is [ <span class="w3-text-red">{{$ip}}</span> ]. This is to inform our users that their IPs are being monitored and all abusive, threatening and illegal messages will be reported to LYNK directly.</p>
                </div>

  


            </form>
    
  </div>
</div>