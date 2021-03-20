<div class="box box-widget mb-3 w3-hover-shadow">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Profiles</h3>
                </div>
                <div class="box-body" style="min-height: 200px;">

@foreach($me->latestProfiles() as $user)

<a title="{{ $user->username }}" href="{{ url('/', $user->username) }}" target="_blank">
    
<img width="150" src="{{ $user->latestCheckedPP() }}" class="rounded img-bordered mb-2 img-fluid"  alt="{{ $user->username }}">
</a>

@if ($loop->iteration == 4)
    @break
@endif
@endforeach

@if ($me->latestProfiles()->count() > 4)

  <div class="text-center">
    
    <a href="" data-url="{{ route('user.myAsset', 'search_latest_users') }}" class="w3-btn  btn-menu-to-container w3-round w3-bgred btn-sm"> See More <i class="fa  fa-angle-double-right"></i></a>

  </div>
@endif
                    
                     
                </div>
            </div>