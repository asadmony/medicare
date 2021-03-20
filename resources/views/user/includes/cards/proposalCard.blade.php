<div class="box box-widget w3-animate-zoom">
                <div class="box-body" style="min-height: 100px;">



<div class="row">
      <div class="col-sm-12">
        <div class="box box-widget w3-border w3-border-purple text-center mb-0">

          <div class="box-header with-border">
            <h3 class="box-title">
              Proposal from <span class="w3-tag w3-purple w3-round w3-large"> <a target="_blank" class="w3-text-white" href="{{ url('/',$proposal->user->username) }}">{{ $proposal->user->username }}</a> </span> to <span class="w3-tag w3-purple w3-round w3-large"> <a target="_blank" class="w3-text-white" href="{{ url('/',$proposal->userSecond->username) }}"> {{ $proposal->userSecond->username }} </a> </span>
            </h3>
          </div>
          <div class="box-body text-center">

            @if(!$proposal->user->active)

 

               <span class="w3-dark-gray   w3-padding w3-small w3-round mr-2">
                Deactivated
              </span>

              @else

              <a target="_blank" href="{{ url('/',$proposal->user->username) }}">
              <img class="rounded img-bordered mb-2" title="{{ $proposal->user->username }}" width="80" src="{{ asset($proposal->user->latestCheckedPP()) }}" alt="{{ $proposal->user->username }}">
 
            </a>
    
              @endif
            
            
            

            <i class="fa fa-angle-double-right  w3-large w3-text-purple"></i> 
            <i class="fa fa-angle-double-right  w3-large w3-text-purple"></i> 
            &nbsp; &nbsp;
            <i class="fa fa-arrow-circle-right w3-animate-fading w3-large w3-text-purple"></i> 
            &nbsp; &nbsp;
            <i class="fa fa-angle-double-right  w3-large w3-text-purple"></i> 
            <i class="fa fa-angle-double-right  w3-large w3-text-purple"></i> 
            

          @if(!$proposal->userSecond->active)

 

              <span class="w3-dark-gray   w3-padding w3-small w3-round mr-2">
                Deactivated
              </span>

          @else


          <a target="_blank" href="{{ url('/',$proposal->userSecond->username) }}">
            <img class="rounded img-bordered mb-2" title="{{ $proposal->userSecond->username }}" width="80" src="{{ asset($proposal->userSecond->latestCheckedPP()) }}" alt="{{ $proposal->userSecond->username }}">
          </a>


          @endif
            
          </div>
          <div class="box-footer w3-light-gray">
            <div class="card mt-0 mb-0">
                <div class="card-body">
              <p>{{ $proposal->message }}</p>

              @if(!$proposal->user->active or !$proposal->userSecond->active)

              <span class="w3-border w3-round ">
                Proposal of deactivated user doesn't work
              </span>
              @else



              @if($proposal->accepted)

                <a class="w3-btn btn-sm w3-white w3-border w3-border-blue w3-round" href="javascript::void(0)">Accepted</a>

              @else

              @if ($proposal->user_id == Auth::id())

              <a data-url="{{ route('user.cancelProposal', $proposal) }}" class="w3-btn btn-sm w3-white w3-border w3-border-red w3-round btn-proposal-reply" href="">Delete</a>

              @else

              <a data-url="{{ route('user.cancelProposal', $proposal) }}" class="w3-btn btn-sm w3-white w3-border w3-border-red w3-round btn-proposal-reply" href="">Cancel</a>

              <a data-url="{{ route('user.acceptProposal', $proposal) }}" class="w3-btn btn-sm w3-blue w3-border w3-border-blue w3-round btn-proposal-reply" href="">Accept</a>
                  
              @endif

              

              @endif

              @endif

              

              

              
                    
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>


                </div>
            </div>