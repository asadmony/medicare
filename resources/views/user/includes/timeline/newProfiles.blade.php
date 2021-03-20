<div class="w3-card-2">
  
<div class="box box-widget mb-3 w3-animate-zoom w3-hover-shadow">
	<div class="box-header with-border">
		<h3 class="box-title">
			Latest Profiles
		</h3>

		<div class="box-tools pull-right">
                <a class="w3-button w3-small w3-round w3-border w3-border-purple w3-hover-purple p-1 btn-menu-to-container" data-url="{{ route('user.myAsset','latest_profiles') }}" href="">View All <i class="fa fa-angle-right"></i></a>             
                
              </div>
	</div>
    <div class="box-body w3-light-gray" style="min-height: 200px;">

<div class="row">
@foreach($me->latest3Profiles() as $user)

<div class="col-sm-4">
	
{{-- <a title="{{ $user->username }}" href="{{ url('/', $user->username) }}" target="_blank">
    
<img width="150" src="{{ $user->latestCheckedPP() }}" class="rounded img-bordered mb-2 "  alt="{{ $user->username }}">
</a> --}}

@include('user.includes.cards.userHoverCard')
</div>


@endforeach

</div>

{{-- @if ($me->latestProfiles()->count() > 4)

    <a href="" data-url="{{ route('user.myAsset', 'search_latest_users') }}" class="w3-btn  btn-menu-to-container w3-round w3-purple btn-sm"> See More <i class="fa  fa-angle-double-right"></i></a>

@endif --}}




    </div>
</div>
</div>