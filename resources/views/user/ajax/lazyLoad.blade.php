{{-- <div class="box box-widget mb-3">
                <div class="box-header with-border">
                    <h3 class="box-title">Best Matching</h3>
                </div>
                <div class="box-body" style="min-height: 200px;">
                    <img src="{{ $me->pp() }}" class="rounded img-bordered mb-2 " alt="{{ $me->username }}">
<img src="{{ $me->latestCheckedPP() }}" class="rounded img-bordered mb-2 " alt="{{ $me->username }}">
<img src="{{ $me->pp() }}" class="rounded img-bordered mb-2 " alt="{{ $me->username }}">
<img src="{{ $me->latestCheckedPP() }}" class="rounded img-bordered mb-2 " alt="{{ $me->username }}">
</div>
</div> --}}


{{-- @include('user.includes.cards.userStatisticsCard') --}}


{{-- @include('user.includes.timeline.myMatch') --}}


@include('user.includes.timeline.myVisitors')

@include('user.includes.timeline.myFavourites')


{{-- 
<div class="box box-widget mb-3">
    <div class="box-header with-border">
                    <h3 class="box-title">My Visitors</h3>
                </div>
                <div class="box-body" style="min-height: 200px;">

@foreach($me->myRelatedUsers('visitor') as $user)

<a title="{{ $user->username }}" href="{{ url('/', $user->username) }}" target="_blank">

<img width="150" src="{{ $user->latestCheckedPP() }}" class="rounded img-bordered mb-2 " alt="{{ $user->username }}">
</a>

@if ($loop->iteration == 4)
@break
@endif
@endforeach

@if ($me->myRelatedUsers('visitor')->count() > 4)

<a href="" data-url="{{ route('user.myAsset', 'my_visitor_users') }}"
    class="w3-btn  btn-menu-to-container w3-round w3-purple btn-sm"> See More <i
        class="fa  fa-angle-double-right"></i></a>

@endif


</div>
</div>




<div class="box box-widget mb-3">
    <div class="box-header with-border">
        <h3 class="box-title">My Favourite Users</h3>
    </div>
    <div class="box-body" style="min-height: 200px;">

        @foreach($me->myRelatedUsers('fav') as $user)

        <a title="{{ $user->username }}" href="{{ url('/', $user->username) }}" target="_blank">

            <img width="150" src="{{ $user->latestCheckedPP() }}" class="rounded img-bordered mb-2 "
                alt="{{ $user->username }}">
        </a>

        @if ($loop->iteration == 4)
        @break
        @endif
        @endforeach

        @if ($me->myRelatedUsers('fav')->count() > 4)

        <a href="" data-url="{{ route('user.myAsset', 'my_favourite_users') }}"
            class="w3-btn  btn-menu-to-container w3-round w3-purple btn-sm"> See More <i
                class="fa  fa-angle-double-right"></i></a>

        @endif


    </div>
</div>

--}}

{{-- @include('user.includes.others.dashboardMessageArea') --}}