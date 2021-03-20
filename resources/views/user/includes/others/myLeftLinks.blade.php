<div class="card card-nav-tabs">
  <h4 class="card-header {{$u->isMale() ? 'card-header-info' : 'card-header-rose'}}"><a class="w3-text-white" href="{{route('user.settings')}}"><i class="fa fa-cog"></i> &nbsp; Settings</a></h4>
  <div class="card-body">

    <a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}" href="{{ route('user.allRelatedUsers','favourite') }}">My Favourite Users </a>

    <a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}" href="{{ route('user.allRelatedUsers','block') }}">My Blocked Users </a>

    <a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}" href="{{ route('user.allRelatedUsers','visitor') }}">My Visitors </a>

    <a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}" href="{{ route('welcome.username',$u->username) }}">My Profile </a>

    <a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}" href="{{ route('user.myProfile') }}">Update Profile </a>


 <a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} " href="{{route('user.myAllPhotos','public')}}">My Public Photos</a> 

 <a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} " href="{{route('user.myAllPhotos', 'private')}}">My Private Photos</a> 

 
 <a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} " href="{{route('user.payNow')}}">New Payment</a>

 <a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} " href="{{route('user.myPaymentHistory')}}">My Payment History</a>

 
    </div>
</div>