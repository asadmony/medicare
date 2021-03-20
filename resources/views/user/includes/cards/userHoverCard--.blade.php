<div class="card-container" style="margin-top: -30px;height: 250px;">
                <div class="card" style="padding: 0px 10px 0px;">
                    <div class="front" style="height: 250px;">
                        <div class="cover" style="height: 60px;">
                            <img src="{{asset($user->UserCoverPic)}}"/>



                        </div>


                        <div class="user">
                            <img class="img-circle" src="{{asset($user->userProfilePic)}}" alt="{{ $user->username }}" />
                        </div>

                        <a style="margin-top: -86px;margin-right: 6px;" href="" class="btn btn-round btn-fab w3-right {{$user->isMale() ? 'btn-info' : 'btn-rose'}}">{{ $user->age() }}</a>

                        <div class="content" style="min-height: 50px;padding: 0px 10px 0px;">
                            <div class="main" style="min-height: 50px;">
                                <h3 class="name" style="font-size: 17px;margin: 0;">{{str_limit($user->username, '20','..')}}


                                    <i class="fa fa-circle {{ $user->isOnline() ? 'text-green' : 'w3-text-light-gray' }} w3-small"></i>

                                </h3>
                                <p class="profession" style="font-size: 15px;margin-bottom: 0;">
                                    @if($user->educationWork)
                                    {{str_limit($user->educationWork->job_title, 22)}}
                                    @else
                                    Job Title
                                    @endif

                                </p>
                                <p class="text-center">

                                   <b>{{$user->location}} {{$user->country}}</b> <br>

                                    {{$user->about ? str_limit($user->about->about_me, '50', '..') : ''}}</p>
                            </div>

                        </div>
                    </div> <!-- end front panel -->


                    <div class="back" style="height: 250px;">
                        <div class="headers w3-padding">
                            {{-- <h5 class="motto"></h5> --}}

            
                                <table class="table   table-condensed">
                    <tr>
                        <td colspan="2">{{$user->about ? str_limit($user->about->headline, 25, '..') : 'Greetings to visitor'}}</td>

                    </tr>

                    <tr>
                        <td><b>Username</b></td><td>{{$user->username}}</td>
                    </tr> 
                    
                    <tr>
                        <td><b>Gender</b></td><td>{{$user->gender}}</td>
                    </tr>

                    <tr>
                        <td><b>Location</b></td><td>{{$user->location}}</td>
                    </tr>

                    <tr><td width="120"><b>Country</b></td><td>
                        @if($user->country == 'Other' || $user->country == 'Others')
                        {{$user->country_other}}
                        @else
                        {{$user->country}}
                        @endif

                    </td></tr>

                    @if (session('uSearch'))
                        <tr><td><b>Profession</b></td><td>
                            @if($user->educationWork)
                            @if($user->educationWork->my_profession == 'Other' || $user->educationWork->my_profession == 'Others')
                            {{str_limit($user->educationWork->my_profession_other,12,'..')}}
 
                            @else
                            {{str_limit($user->educationWork->my_profession,12,'..')}}
                            @endif
                            @endif
                        </td></tr>
                    @endif

                    

                    <tr>
                        <td><b>Looking For</b> </td><td>{{str_limit($user->looking_for,12,'..')}}</td>
                    </tr>

                </table>
 

                <div class="text-center">
                    <a class="w3-btn w3-small w3-round w3-border w3-border-blue" href="{{url('/', $user->username)}}"><i class="fa fa-user fa-fw"></i> See Details</a>
                    @auth
                    @if (Auth::id() !== $user->id)

                        

                        @if (Auth::user()->isBlockedByMe($user))
                            <?php $u = $user; ?>
                            @include('user.ajax.blockBtnArea')
                        @else
                        <a href="{{route('userMessage',['user'=>$user])}}"  class="btn {{$user->isMale() ? 'btn-info' : 'btn-rose'}} btn-raised btn-fab btn-round" title="Send {{ $user->himOrHer() }} a Message" data-toggle="tooltip">
                                <i class="material-icons">email</i>
                                <div class="ripple-container"></div>
                            </a>
                        @endif
                        
                    @endif

                    @endauth
                    
                </div>

                            
                        </div>

                        

                        {{-- <div class="footer">
                            <div class="social-links text-center">
                                <a href="" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                <a href="" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                <a href=""><i class="fa fa-twitter fa-fw"></i></a>

                                <a href="{{route('welcome.username', $user->username)}}"><i class="fa fa-user fa-fw"></i> See Details</a>
                            </div>
                        </div> --}}
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container --> 