@if (Auth::user()->isMyContact($user))
<a href="{{ route('user.makeContact', $user) }}"  class="btn btn-link btn-add-user btn-primary no-padding  mb-0" title="Added {{ $user->himOrHer() }}" >
    <img src="{{ asset('img/mobile.svg') }}" style="width: 25px;" alt="{{ env('APP_NAME_BIG') }}"> Added  ({{ Auth::user()->contactLimit() }} remaining)
</a>
@else
<a href="{{ route('user.makeContact', $user) }}"  class="btn btn-link btn-add-user btn-primary no-padding mb-0" title="Add to Contact {{ $user->himOrHer() }}  ({{ Auth::user()->contactLimit() }} remaining)" >
     <i class="fa fa-phone text-red "></i> Add to Contact ({{ Auth::user()->contactLimit() }})
</a>
@endif