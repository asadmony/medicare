  @include('alerts')
  <div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Quick SMS</h3>
  </div>
  <div class="box-body">
    <form class="form-horizontal" method="post"  action="{{route('admin.quickSmsDraftSendPost',$bulk)}}">        

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
                    <span>Your Masking Number (Sender Number)</span><br>
                    @if ($errors->has('sender_number'))
                      <span class="help-block">
                          <strong>{{ $errors->first('sender_number') }}</strong>
                      </span>
                  @endif
                  </div>
                </div> 

                <div class="form-group{{ $errors->has('masking') ? ' has-error' : '' }}"> 
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><input type="checkbox" name="masking" {{ $bulk->sent_from ? 'checked' : '' }}>  Masking (T.M. Media) </label>
                      @if ($errors->has('masking'))
                      <span class="help-block">
                          <strong>{{ $errors->first('masking') }}</strong>
                      </span>
                  @endif
                    </div>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
                  <label for="message" class="col-sm-3 control-label">Message <br>(160 characters)</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="5" name="message" placeholder="Message">{{$bulk->message}}</textarea>
                    @if ($errors->has('message'))
                      <span class="help-block">
                          <strong>{{ $errors->first('message') }}</strong>
                      </span>
                  @endif
                  </div>
                </div>


                {{-- <div class="form-group{{ $errors->has('accept') ? ' has-error' : '' }}"> 
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
                </div> --}}
            

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="reset" class="btn btn-default">Cancel</button>

                  <button type="submit" class="btn btn-primary pull-right">Send</button>

                  </div>
                </div>


                {{-- <div class="col-sm-offset-3 col-sm-9">
                  <p><b>Tip: </b> Mentioning your name in the SMS will help the receiver to recognize you.</p>
                  <p><b>Note: </b>Note: According to the LYNK Rules and Regulations, Abusive, Threatening or Illegal SMS is a Crime and can be prosecuted in the court of law. Please note your IP Address is [ <span class="w3-text-red">{{$ip}}</span> ]. This is to inform our users that their IPs are being monitored and all abusive, threatening and illegal messages will be reported to LYNK directly.</p>
                </div> --}}

  


            </form>
    
  </div>
</div>