@if (Auth::user()->isBlockedByMe($user))
                
<a href="{{ route('user.blockThisUser', $user) }}"  class="btn btn-link btn-add-user btn-primary  no-padding" title="Unblock {{ $user->himOrHer() }}" >
             <i class="fa fa-square text-red"></i> Unblock {{ $user->himOrHer() }}
</a>

            @else

<a href="{{ route('user.blockThisUser', $user) }}"  class="btn btn-link btn-add-user btn-primary  no-padding" title="Block {{ $user->himOrHer() }}">
             <i class="fa fa-square-o text-red"></i> Block {{ $user->himOrHer() }}
</a>

            @endif