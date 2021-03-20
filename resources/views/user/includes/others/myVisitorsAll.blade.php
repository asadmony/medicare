<div class="card card-nav-tabs">
  <h4 class="card-header {{$u->isMale() ? 'card-header-info' : 'card-header-rose'}}"><a class="w3-text-white" href="{{ route('user.allRelatedUsers','visitor') }}"><i class="fa fa-users"></i> &nbsp; Visitors All</a></h4>
  <div class="card-body" style="min-height: 500px;">

  	@foreach($u->latest4Visitors() as $visitor)

    <a href="{{ route('welcome.username',$visitor->username) }}"> 
    <div class="media  w3-card p-3">
  <img src="{{asset($visitor->userProfilePic)}}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
  <div class="media-body">
    <h4>{{ $visitor->username }} <small><i> {{ $visitor->pivot->updated_at->diffForHumans() }}</i></small></h4>
    <p>Total Visits {{ $visitor->pivot->visits }} times</p>  
  </div>
</div>
</a>

    @endforeach

@if ($u->hasMoreVisitor())
      <br>

<div class="text-center">
    <a class="w3-btn w3-round w3-border w3-border-blue w3-white btn-xs" href="{{ route('user.allRelatedUsers','visitor') }}">See More Visitors</a>
</div>
@endif

 

            </div>
        </div>