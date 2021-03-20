<div class="box box-widget mb-3">
    <div class="box-header with-border">
        <h3 class="box-title"> Massages</h3>
                </div>
                <div class="box-body" style="min-height: 200px;">



   <?php $chatto = $me->chattoAll; ?>
    @foreach ($chatto as $chatable)

@if($chatable->user())

<?php $user = $chatable->chatBy; ?>
@if ($user)

@if ($me->isBlockedByMe($user) || $user->isBlockedByMe($me))
 
@else

<a  href="{{ route('userMessage',$user) }}"> 
    <div class="media {{ $chatable->unseenCount() ? 'w3-border w3-border-blue' : '' }} w3-card p-3">
  <img src="{{asset($user->latestCheckedPP())}}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
  <div class="media-body">

<h4>{{ $user->username }} </h4>
<p><small>
  @if(!$me->isPaidAndValidate())
  <a href="" data-url="{{ route('user.myAsset', 'pay_now') }}" class="btn btn-primary btn-link no-padding btn-menu-to-container"> Pay Now</a> and see the message
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