<div class="modal-content">
                <div class="modal-header">
                    {{-- <h3 class="modal-title w3-large">Send Proposal to <span class="w3-tag w3-purple w3-round w3-large"> {{ $user->username }} </span></h3> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">


    <div class="row">
      <div class="col-sm-12">
        <div class="box box-widget w3-border w3-border-purple text-center">
          <div class="box-header with-border">
            <h3 class="box-title">
              Send Proposal to <span class="w3-tag w3-purple w3-round w3-large"> {{ $user->username }} </span>
            </h3>
          </div>
          <div class="box-body text-center">
            <img class="rounded img-bordered" title="{{ Auth::user()->username }}" width="80" src="{{ asset(Auth::user()->userProfilePic) }}" alt="{{ Auth::user()->username }}">

            <i class="fa fa-angle-double-right  w3-large w3-text-purple"></i> 
            <i class="fa fa-angle-double-right  w3-large w3-text-purple"></i> 
            &nbsp; &nbsp;
            <i class="fa fa-arrow-circle-right w3-animate-fading w3-large w3-text-purple"></i> 
            &nbsp; &nbsp;
            <i class="fa fa-angle-double-right  w3-large w3-text-purple"></i> 
            <i class="fa fa-angle-double-right  w3-large w3-text-purple"></i> 

            <img class="rounded img-bordered" title="{{ $user->username }}" width="80" src="{{ asset($user->userProfilePic) }}" alt="{{ $user->username }}">
          </div>
        </div>
      </div>
    </div>



<form class="form-send-proposal" action="{{ route('user.sendProposalPost', $user) }}" method="post">
 
 {{-- <div class="form-group {{ $errors->has('comment') ? ' has-danger' : '' }}">
  <label for="comment">Write something to {{ $user->username }} </label>
  <textarea class="form-control w3-border w3-padding {{ $errors->has('comment') ? ' w3-border-red' : '' }}" name="comment" rows="3" placeholder="Write something to {{ $user->username }}" id="comment">{{ old('comment') ?: 'Dear '. $user->username . ', I would like to send you my proposal. Please, accept it as if it helps us to start our conversation in a better way...' }}</textarea>
  @if ($errors->has('comment'))
    <span class="help-block">
        <strong>{{ $errors->first('comment') }}</strong>
    </span>
  @endif
</div> --}}
<div class="form-check form-check-radio">
  <label class="form-check-label">
      <input class="form-check-input" type="radio" name="comment" id="exampleRadios1" value="option1" checked>
      opt 1
      <span class="circle">
          <span class="check"></span>
      </span>
  </label>
</div>
<div class="form-check form-check-radio">
  <label class="form-check-label">
      <input class="form-check-input" type="radio" name="comment" id="exampleRadios2" value="option2" >
      opt 2
      <span class="circle">
          <span class="check"></span>
      </span>
  </label>
</div>

<div class="form-check form-check-radio">
  <label class="form-check-label">
      <input class="form-check-input" type="radio" name="comment" id="exampleRadios3" value="option3" >
      opt 3
      <span class="circle">
          <span class="check"></span>
      </span>
  </label>
</div>


{{ csrf_field() }}

 
 
  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-send"></i> &nbsp; Send</button>
</form>

                     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>