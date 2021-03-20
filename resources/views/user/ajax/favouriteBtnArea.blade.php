@if (Auth::user()->isMyFavourite($user))
<a href="{{ route('user.makeFavourite', $user) }}"  class="btn btn-link btn-add-user btn-primary no-padding  mb-0" title="Unfavourite {{ $user->himOrHer() }}" >
    <img src="{{ asset('img/heart.svg') }}" style="width: 20px;" alt="{{ env('APP_NAME_BIG') }}"> Unfavourite {{ $user->himOrHer() }}
</a>
@else
<a href="{{ route('user.makeFavourite', $user) }}"  class="btn btn-link btn-add-user btn-primary no-padding mb-0" title="Favourite {{ $user->himOrHer() }}" >
     <i class="fa fa-heart-o text-red "></i> Favourite {{ $user->himOrHer() }}
</a>
@endif

{{-- @if (Auth::user()->isMyFavourite($user))
<a href="{{ route('user.makeFavourite', $user) }}"  class="btn btn-primary btn-fab btn-round btn-add-user" title="Unfavourite {{ $user->himOrHer() }}" >
    <i class="material-icons w3-hover-gray">favorite</i>
    <div class="ripple-container"></div>
</a>
@else
<a href="{{ route('user.makeFavourite', $user) }}"  class="btn btn-default btn-fab btn-round btn-add-user" title="Favourite {{ $user->himOrHer() }}" >
    <i class="material-icons w3-hover-purple">favorite</i>
    <div class="ripple-container"></div>
</a>
@endif --}}