<div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Send SMS To Business</h3>
  </div>
  <form class="form-horizontal form-edit-directory" method="post" action="{{route('admin.sendSmsToBusinessPost')}}" >
  <div class="box-body">
    

    {{csrf_field()}}
          <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                  <label for="category" class="col-sm-3 control-label">Category</label>
                  <div class="col-sm-9">
                    <select id="category"
            name="category"
            class="form-control select2-container step2-select select2 cat-select"
            data-placeholder="Business Category Name"
            data-ajax-url="{{route('welcome.selectCatsFromDirectory')}}"
            data-ajax-cache="true"
            data-ajax-dataType="json"
            data-ajax-delay="200"
            style="width: 100%;">
            @if(old('category'))
              <option>{{old('category')}}</option>
            @endif
                 
              </select>
            @if( $errors->has('category') )
              <span class="help-block">{{ $errors->first('category') }}</span>
            @endif
                  </div>
                </div> 

        <div class="form-group {{ $errors->has('thana') ? ' has-error' : '' }}">
                  <label for="thana" class="col-sm-3 control-label">Thana</label>
                  <div class="col-sm-9">
                    <select id="thana"
            name="thana"
            class="form-control select2-container step2-select select2 thana-select"
            data-placeholder="Thana"
            data-ajax-url="{{route('welcome.selectThanaWithCatFromDirectory')}}"
            data-ajax-cache="true"
            data-ajax-dataType="json"
            data-ajax-delay="200"
            style="width: 100%;">

            @if(old('thana'))
              <option>{{old('thana')}}</option>
            @endif
                 
              </select>
            @if( $errors->has('thana') )
              <span class="help-block">{{ $errors->first('thana') }}</span>
            @endif
                  </div>
                </div>

        <div class="form-group {{ $errors->has('totalSms') ? ' has-error' : '' }}">
          <label for="totalSms" class="col-sm-3 control-label">Number of Total SMS <br>(0.10 TK Per SMS)</label>
          <div class="col-sm-9">
            <input type="number" min="1" max="100" step="1" name="totalSms" value="{{ old('totalSms') }}" class="form-control" id="totalSms" placeholder="Number of Total SMS (1 to 100)" >
            @if ($errors->has('totalSms'))
              <span class="help-block">
                  <strong>{{ $errors->first('totalSms') }}</strong>
              </span>
          @endif
          </div>
        </div> 

        <div class="form-group {{ $errors->has('sentFrom') ? ' has-error' : '' }}">
          <label for="sentFrom" class="col-sm-3 control-label">Sent From</label>
          <div class="col-sm-9">
            <input type="text"  name="sentFrom" value="{{ old('sentFrom') }}" class="form-control" id="sentFrom" placeholder="The number sending from" >
            @if ($errors->has('sentFrom'))
              <span class="help-block">
                  <strong>{{ $errors->first('sentFrom') }}</strong>
              </span>
          @endif
          </div>
        </div> 

        <div class="form-group {{ $errors->has('totalSms') ? ' has-error' : '' }}">
          <label for="totalSms" class="col-sm-3 control-label">Message</label>
          <div class="col-sm-9">
            <textarea name="message" placeholder="Message" class="form-control" id="message" cols="30" rows="4">{{old('message')}}</textarea>
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
              {{-- <button type="reset" class="btn btn-default">Cancel</button> --}}
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </div>

        <div class="col-sm-offset-3 col-sm-9">
          <p><b>Tip: </b> Mentioning your name in the SMS will help the receiver to recognize you.</p>
          <p><b>Note: </b>Note: According to the LYNK Rules and Regulations, Abusive, Threatening or Illegal SMS is a Crime and can be prosecuted in the court of law. Please note your IP Address is [ <span class="w3-text-red">{{$ip}}</span> ]. This is to inform our users that their IPs are being monitored and all abusive, threatening and illegal messages will be reported to LYNK directly.</p>
        </div>


  </div>
</form>
</div>









