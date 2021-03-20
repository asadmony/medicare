<div class="card card-nav-tabs">
  <h4 class="card-header {{$u->isMale() ? 'card-header-info' : 'card-header-rose'}}"><a class="w3-text-white" href="{{route('userMessageDashboard')}}"><i class="fa fa-envelope"></i> &nbsp; Messages All</a></h4>
  <div class="card-body" style="min-height: 500px;">

    <?php $chatto = Auth::user()->chattoAll; ?>
    @foreach ($chatto as $chatable)

@if($chatable->user())

<?php $user = $chatable->chatBy; ?>
@if ($user)

@if (Auth::user()->isBlockedByMe($user) || $user->isBlockedByMe(Auth::user()))
 
@else

<a  href="{{ route('userMessage',$user) }}"> 
    <div class="media {{ $chatable->unseenCount() ? 'w3-border w3-border-blue' : '' }} w3-card p-3">
  <img src="{{asset($user->userProfilePic)}}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
  <div class="media-body">

<h4>{{ $user->username }} </h4>
<p><small>
  @if(!Auth::user()->isValidate())
  <a class="" href="{{route('user.payNow')}}">Pay Now </a> and see the message
  @else
  {{$chatable->latestMessage()}}
  @endif
</small>
  <span class="help-block w3-tiny ">{{$chatable->unseenCount() ? $chatable->updated_at->diffForHumans() : ''}} <span class="pull-right">{{$chatable->unseenCount() ? $chatable->unseenCount() . ' New' : ''}}</span></span>
</p>
 
  </div>
</div>
</a>

@endif




 
@endif
 

 

@endif
@endforeach

<br>

<div class="text-center">
    <a class="w3-btn w3-round w3-border w3-border-blue w3-white btn-xs" href="{{route('userMessageDashboard')}}">See All Messages</a>
</div>


            </div>  
        </div>