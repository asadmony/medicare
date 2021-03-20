<div class="box box-widget mb-3 w3-animate-zoom">
                <div class="box-body" style="min-height: 200px;">

                    <div class="row">
                        <div class="col-sm-3">
                            {{-- <img class="img-bordered rounded mb-4" src="{{ asset($user->userProfilePic) }}" style="width: 100%;" alt=""> --}}

                            <img src="{{ asset($user->userProfilePic) }}" class="rounded img-bordered mb-4 "  alt="{{ $user->username }}" style="max-width: 170px;">
                        </div>
                        <div class="col-sm-9">



                            <div class="row">
                                <div class="col-sm-8">

                                    <!-- Basic ST -->
                                    <div class="profile_basic">

                                        <label class="profile-data-label">{{ $user->username }} 
                                            @if($user->isOnline())
                                            <img src="{{ asset('img/online.gif') }}" alt="Online" style="width: 20px;">
                                            @else
                                            <i class="fa fa-circle w3-text-light-gray w3-small"></i>
                                            @endif
                                            
                                        </label><div class="profile-data-info"></div>
                                        <div class="clearfix"></div> 

                                        <label class="profile-data-label">Profile created by</label><div class="profile-data-info">: {{ $user->profile_created_by or '(Not set yet)' }}</div>
                                        <div class="clearfix"></div> 



                                        <label class="profile-data-label">Age</label><div class="profile-data-info">: {{ $user->age() }}</div>
                                        <div class="clearfix"></div> 

                                        {{-- <label class="profile-data-label">Height</label><div class="profile-data-info">: 55</div>
                                        <div class="clearfix"></div>  --}}

                                        <label class="profile-data-label">Religion/Community</label><div class="profile-data-info">: {{ $user->religion }}</div>
                                        <div class="clearfix"></div> 

                                        <label class="profile-data-label">Education</label><div class="profile-data-info">: BSc</div>
                                        <div class="clearfix"></div> 

                                        <label class="profile-data-label">Profession</label><div class="profile-data-info">: Engineer</div>
                                        <div class="clearfix"></div> 

                                        <label class="profile-data-label">Marital Status</label><div class="profile-data-info">: Never Married</div>
                                        <div class="clearfix"></div> 

                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    
                                    @include('user.includes.others.btnRightArea')



                                </div>
                            </div>

                            <div class="w3-border-top w3-border-light-gray">

                                <span>{{ str_limit($user->aboutMe(), 50,'..') }}</span> <a href="{{ route('welcome.username', $user->username) }}" class="btn btn-primary btn-link no-padding">More</a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>