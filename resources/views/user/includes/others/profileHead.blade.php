<div class="fb-profile">
    @include('user.ajax.profileCoverPic')
    @include('user.ajax.profilePic')
    <div class="fb-profile-text">
        <h1>{{$u->username}}
        @auth


        @if ( $u->id !== Auth::id() )
        &nbsp;
        <a href="{{route('userMessage',['user'=>$u])}}"  class="btn {{$u->isMale() ? 'btn-info' : 'btn-rose'}} btn-raised btn-fab btn-round" title="Send {{ $u->himOrHer() }} a Message" data-toggle="tooltip">
            <i class="material-icons">email</i>
            <div class="ripple-container"></div>
        </a>
        &nbsp;

        <span class="btn-area">
        @include('user.ajax.favouriteBtnArea')
        </span>

        

        
        <div class="w3-right">
            
            <span class="btn-area">
            @include('user.ajax.blockBtnArea')
            </span>
            

            &nbsp;

            <a href="#"  class="btn btn-default btn-fab btn-round" title="Report about {{ $u->himOrHer() }}" 
                {{-- data-toggle="tooltip" --}}
                data-toggle="modal" 
                data-target="#reportModal">
            <i class="material-icons w3-hover-deep-orange">report</i>
            <div class="ripple-container"></div>
            </a>


        </div>
        @endif


        @endauth
        </h1>
        <p>{{$u->about ? $u->about->headline : 'Greetings to visitor'}}</p>
    </div>
</div> <!-- .fb-profile -->

