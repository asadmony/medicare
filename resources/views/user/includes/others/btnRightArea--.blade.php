<div class="float-md-right">

                                        @if (Auth::check())
                                            
                                        

                                        @if (Auth::user()->isBlockedByMe($user))
                                        @else

                                        <!--<a href="{{ route('welcome.username', $user->username) }}" target="_blank" class="btn btn-link btn-primary no-padding mb-0"> <img src="{{ asset('img/doc.gif') }}" style="width: 19px;" alt=""> View Full Profile</a> <br>-->

                                        <!--<a target="_blank" href="{{ route('user.userDetailsPrint', $user) }}" class="btn btn-link btn-primary no-padding mb-0" style="margin-left: -10px;"><img src="{{ asset('img/printer.gif') }}" style="width: 28px;" alt="{{ $user->username }}"> Print This</a>-->
                                             @if(Auth::user()->package>0)
                                        <a  href="{{ route('welcome.username', $user->username) }}" target="_blank" class="btn btn-link btn-primary no-padding mb-0 "> <img src="{{ asset('img/doc.gif') }}" style="width: 19px;" alt=""  > View Full Profile</a> <br>

                                        <a target="_blank" href="{{ route('user.userDetailsPrint', $user) }}" class="btn btn-link btn-primary no-padding mb-0 " style="margin-left: -10px;"><img src="{{ asset('img/printer.gif') }}" style="width: 28px;" alt="{{ $user->username }}"> Print This</a>

                                                @else
                                                    <a  href="" onclick="please buy a package" class="btn btn-link btn-primary no-padding mb-0 "> <img src="{{ asset('img/doc.gif') }}" style="width: 19px;" alt=""  > View Full Profile</a> <br>

                                                       <a  href="" class="btn btn-link btn-primary no-padding mb-0 " style="margin-left: -10px;"><img src="{{ asset('img/printer.gif') }}" style="width: 28px;" alt="{{ $user->username }}"> Print This</a>
      
                                                    @endif
                                        @endif


                                         

                                        @if((Auth::id() == $user->id) or (Auth::user()->isBlockedByMe($user)))
                                        @else

                                        @if(!Auth::user()->contactInfoViewPermissionOf($user))

                                        <br>
                                        
                                         @if(Auth::user()->package>0)
                                        <span class="btn-area">
                                           
                                            @include('user.ajax.contactBtnArea')
                                            
                                        </span>
                                            @endif
                                        @endif

                                        

                                        <br>

                                       @if(Auth::user()->package>0)
                                        <span class="btn-area">
                                            @include('user.ajax.favouriteBtnArea')
                                        </span>
                                        @endif

                                        <br>
                                        

                            <!--            <a href="" class="btn btn-link btn-send-proposal-modal btn-primary mb-0 no-padding" data-url="{{ route('user.sendProposal', $user) }}"><i class="fa fa-share"></i> send proposal</a> -->

                            <!--            <br>-->


                             

                            <!--<a href="{{route('userMessage',['user'=>$user])}}" class="btn btn-link mb-0  btn-primary no-padding" ><img src="{{ asset('img/message.svg') }}" alt="{{ env('APP_NAME_BIG') }} Message" style="width: 21px;">  send Message</a> -->

                            <a href="" class="btn btn-link btn-send-proposal-modal btn-primary mb-0 no-padding " data-url="{{ route('user.sendProposal', $user) }}"><i class="fa fa-share"></i> send proposal</a> 
                                        <br>

                                    @if(Auth::user()->package>0)

                                        


                             

                                     <a href="{{route('userMessage',['user'=>$user])}}" class="btn btn-link mb-0  btn-primary no-padding" ><img src="{{ asset('img/message.svg') }}" alt="{{ env('APP_NAME_BIG') }} Message" style="width: 21px;">  send Message</a> 

                                    @else
                                         

                                     <a href="" class="btn btn-link mb-0  btn-primary no-padding " ><img src="{{ asset('img/message.svg') }}" alt="{{ env('APP_NAME_BIG') }} Message" style="width: 21px;">  send Message</a> 

                                     @endif


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
                                            <!--@include('user.ajax.blockBtnArea')-->
                                             @if(Auth::user()->package>0)
                                            @include('user.ajax.blockBtnArea')
                                            @endif
                                        </span>



                                        @endif
                                        @endif
                                    </div>