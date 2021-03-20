<div class="float-md-right">

    @if (Auth::check())



    @if (Auth::user()->isBlockedByMe($user))
    @else

    <a href="{{ route('welcome.username', $user->username) }}" target="_blank" class="btn btn-link btn-primary no-padding mb-0"> <img src="{{ asset('img/profile.svg') }}" style="width: 21px;" alt=""> View Full Profile</a> <br>

    <a target="_blank" href="{{ route('user.userDetailsPrint', $user) }}" class="btn btn-link btn-primary no-padding mb-0" ><img src="{{ asset('img/printer.gif') }}" style="width: 21px;border-radius: 3px;" alt="{{ $user->username }}"> Print This</a>

    @endif




    @if((Auth::id() == $user->id) or (Auth::user()->isBlockedByMe($user)))
    @else

    @if(!Auth::user()->contactInfoViewPermissionOf($user))

    <br>

    <span class="btn-area">
        @include('user.ajax.contactBtnArea')
    </span>

    @endif



    <br>

    <span class="btn-area">
        @include('user.ajax.favouriteBtnArea')
    </span>

    <br>


    <a href="" class="btn btn-link btn-send-proposal-modal btn-primary mb-0 no-padding" data-url="{{ route('user.sendProposal', $user) }}"><i class="fa fa-share"></i> send proposal</a> 
 
    <br>




    <a href="{{route('userMessage',['user'=>$user])}}" class="btn btn-link mb-0  btn-primary no-padding" > <i class="fa fa-envelope"></i>  Send Message</a> 

                                        {{-- <br>
                                        <a href="#"  class="btn btn-link no-padding btn-primary" title="Report about {{ $user->himOrHer() }}" 
                                            data-toggle="modal" 
                                            data-target="#reportModal">
                                        <i class="fa  fa-warning"></i> Report
                                    </a> --}}




                                    @endif

                                    @if (Auth::id() == $user->id)
                                    @else

                                    <br>
                                    <span class="btn-area">
                                        @include('user.ajax.blockBtnArea')
                                    </span>



                                    @endif
                                    @endif
                                </div>