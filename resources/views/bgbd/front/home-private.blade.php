@extends('bgbd.master')
@section('content')

<!-- search banner start -->
@include('bgbd.subpage.banner')
<!-- search banner end -->

<!-- Rebbon start-->



<section>
    <div style="padding: 0px; color: #000; width: 100%; background: #fff;">
        <div class="container-fluid w3-mobile">
          <div class="row">
            <div style="width:33.33%;background:#d81f26;color:#fff;" class="w3-card w3-center w3-hover-shadow w3-mobile">
              <i class="mt-3 fas fa-briefcase fa-2x "></i>
              <p style="font-size: 20px;">100% Privacy & Confidentiality</p>
            </div>
            <div style="width:33.33%;background:#f09f1f;color:#fff;" class="w3-card w3-center w3-hover-shadow  w3-mobile">
              <i class="mt-3 fas fa-lock fa-2x"></i>
              <p style="font-size: 20px;">Best Data Security</p>
            </div>
            <div style="width:33.33%;background:#731019;color:#fff;" class=" w3-card w3-center w3-hover-shadow   w3-mobile">
              <i class="mt-3 fas fa-user-check fa-2x"></i>
              <p style="font-size: 20px;">Verified Genuine Profiles</p>
            </div>
          </div>
        </div>
      </div>
</section>
<!--rebbon end-->

<!-- new arival start  -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 new-arrival py-5 pl-sm-0">
                <a href="{{ route('latest_profile') }}">NEW ARRIVAL</a>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    @foreach ($latestProfiles as $item)
                    @php
                    if ($item->settings_name == 1){
                    $name = trim($item->first_name) ." ". trim($item->last_name);
                    }
                    elseif ($item->settings_name == 2){
                    $name = trim($item->first_name);
                    }
                    else{
                    $name = trim($item->last_name);
                    }
                    @endphp
                    <div class="col-lg col-sm-6 col-md-4 pl-sm-0 ml-sm-0 pr-2">
                        <div class="card border-0">
                            <div class="card-image">
                                @if(isset(Auth::user()->id) && Auth::user()->premium && $item->picid != '' &&
                                file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                                    class="image card-img-top" alt="{{ $name }}" />
                                @elseif(!$item->private && $item->picid != '' &&
                                file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                                    class="image card-img-top" alt="{{ $name }}" />
                                @else
                                @if ($item->gender == 1)
                                <img src="{{ url('assets/defaults/male.png') }}" class="image card-img-top"
                                    alt="{{ $name }}" />
                                @else
                                <img src="{{ url('assets/defaults/female.png') }}" class="image card-img-top"
                                    alt="{{ $name }}" />
                                @endif
                                @endif
                                <div class="middle">
                                    <div class="text">
                                        <a href="#" class="activity add-like inactive" id="lik-{{ $item->id }}"
                                            title="Like Profile">
                                            <i class="fas fa-thumbs-up"></i>
                                        </a>
                                        <a href="#"
                                            class="activity {{ ($gender == $item->gender)?"invalid_gender":"add-interest" }} inactive"
                                            id="int-{{ $item->id }}" title="Send Interest">
                                            <i class="fas fa-star"></i>
                                        </a>
                                        <a href="#" class="activity {{ ($gender == $item->gender)?"invalid_gender":"add-contact" }}  inactive" id="con-{{ $item->id }}" title="Contact Details">
                                            <i class="fas fa-phone-alt"></i>
                                        </a>
                                        <a href="#" class="activity {{ ($gender == $item->gender)?"invalid_gender":"send-message" }}  inactive" id="msg-{{ $item->id }}" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                        <a href="#" class="activity {{ ($gender == $item->gender)?"invalid_gender":"add-favourite" }} inactive" id="fav-{{ $item->id }}" title="Add Favourite">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body w3-center arrival-card pl-0 ml-0">
                                {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}"
                                    class="py-0 my-0 profile-title">{{ $name }}</a> --}}
                                <p class="py-0 my-0"><strong>ID: BG-{{ ($item->created_at->format('ymd').$item->id) }}</strong></p>

                                <p class="card-text arrival-text p-0 m-0 pb-2">
                                    {{ \App\Common::getAge($item->date_of_birth) }} yrs <strong> | </strong>
                                    {{ height($item->height) }} <strong> |
                                    </strong> {{ religion($item->religion) }} <strong> | </strong>
                                    {{ $item->education_level ?? ' - ' }}</p>
                                <a href="{{ \App\Common::getUserUrl($item->id) }}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                                    Profile</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end card -->
            <div class="col-sm-12 mt-5 arrival-button">
                <a href="{{ route('latest_profile') }}" class="btn arrival-btn-text">
                    VIEW MORE
                    <i class="fas fa-chevron-right more-icon">
                    </i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- new arrival end -->


<!-- featured section start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 new-arrival py-5 pl-sm-0">
                <a href="{{ route('feature_profile') }}"> FEATURED</a>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    @foreach ($featuedProfiles as $item)
                    @php
                    if ($item->settings_name == 1){
                    $name = trim($item->first_name) ." ". trim($item->last_name);
                    }
                    elseif ($item->settings_name == 2){
                    $name = trim($item->first_name);
                    }
                    else{
                    $name = trim($item->last_name);
                    }
                    @endphp
                    <div class="col-lg col-sm-6 col-md-4 pl-sm-0 ml-sm-0 pr-2">
                        <div class="card border-0">
                            <div class="card-image">
                                @if(isset(Auth::user()->id) && Auth::user()->premium && $item->picid != '' &&
                                file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                                    class="image card-img-top" alt="{{ $name }}" />
                                @elseif(!$item->private && $item->picid != '' &&
                                file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                                    class="image card-img-top" alt="{{ $name }}" />
                                @else
                                @if ($item->gender == 1)
                                <img src="{{ url('assets/defaults/male.png') }}" class="image card-img-top"
                                    alt="{{ $name }}" />
                                @else
                                <img src="{{ url('assets/defaults/female.png') }}" class="image card-img-top"
                                    alt="{{ $name }}" />
                                @endif
                                @endif
                                <div class="middle">
                                    <div class="text">
                                        <a href="#"><i class="fas fa-thumbs-up"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-phone-alt"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                        <a href="#"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body w3-center arrival-card pl-0 ml-0">
                                {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}"
                                    class="py-0 my-0 profile-title">{{ $name }}</a> --}}
                                <p class="py-0 my-0"><strong>ID: BG-{{ ($item->created_at->format('ymd').$item->id) }}</strong></p>

                                <p class="card-text arrival-text p-0 m-0 pb-2">
                                    {{ \App\Common::getAge($item->date_of_birth) }} yrs <strong> | </strong>
                                    {{ height($item->height) }} <strong> |
                                    </strong> {{ religion($item->religion) }} <strong> | </strong>
                                    {{ $item->education_level ?? ' - ' }}</p>
                                <a href="{{ \App\Common::getUserUrl($item->id) }}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                                    Profile</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    @foreach ($featuedProfiles_bride as $item)
                    @php
                    if ($item->settings_name == 1){
                    $name = trim($item->first_name) ." ". trim($item->last_name);
                    }
                    elseif ($item->settings_name == 2){
                    $name = trim($item->first_name);
                    }
                    else{
                    $name = trim($item->last_name);
                    }
                    @endphp
                    <div class="col-lg col-sm-6 col-md-4 pl-sm-0 ml-sm-0 pr-2">
                        <div class="card border-0">
                            <div class="card-image">
                                @if(isset(Auth::user()->id) && Auth::user()->premium && $item->picid != '' &&
                                file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                                    class="image card-img-top" alt="{{ $name }}" />
                                @elseif(!$item->private && $item->picid != '' &&
                                file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                                    class="image card-img-top" alt="{{ $name }}" />
                                @else
                                @if ($item->gender == 1)
                                <img src="{{ url('assets/defaults/male.png') }}" class="image card-img-top"
                                    alt="{{ $name }}" />
                                @else
                                <img src="{{ url('assets/defaults/female.png') }}" class="image card-img-top"
                                    alt="{{ $name }}" />
                                @endif
                                @endif
                                <div class="middle">
                                    <div class="text">
                                        <a href="#"><i class="fas fa-thumbs-up"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-phone-alt"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                        <a href="#"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body w3-center arrival-card pl-0 ml-0">
                                {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}"
                                    class="py-0 my-0 profile-title">{{ $name }}</a> --}}
                                <p class="py-0 my-0"><strong>ID: BG-{{ ($item->created_at->format('ymd').$item->id) }}</strong></p>

                                <p class="card-text arrival-text p-0 m-0 pb-2">
                                    {{ \App\Common::getAge($item->date_of_birth) }} yrs <strong> | </strong>
                                    {{ height($item->height) }} <strong> |
                                    </strong> {{ religion($item->religion) }} <strong> | </strong>
                                    {{ $item->education_level ?? ' - ' }}</p>
                                <a href="{{ \App\Common::getUserUrl($item->id) }}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                                    Profile</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end card -->
            <div class="col-sm-12 mt-5 arrival-button">
                <a href="{{ route('feature_profile') }}" class=" arrival-btn-text">
                    VIEW MORE <i class="fas  fa-chevron-right"></i>
                </a>

            </div>
        </div>
    </div>
</section>
<!-- featured section end -->


{{-- wedding success story start --}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 new-arrival py-5 pl-2 pl-sm-0">
                <a href="">SUCCESS STORY</a>
            </div>
            <div class="row d-block d-md-none d-lg-none">
                @foreach ($wedding_solutions as $item)
                    <div class="col-md-4 mt-2">
                        <div class="w3-card w3-mobile">
                            <img class="rounded-circle" src="{{ asset("wedding_solutions/{$item->id}.{$item->picture}") }}" alt="Alps" style="width:100%">
                            <div class="w3-container w3-center">
                                <h5 class="card-title text-center" style="font-family: 'Great Vibes', cursive; font-weight: 400; font-size: 25px;">{{ $item->title }}</h5>
                                <p>{{$item->description}}</p>
                                {{-- <p><a href="" style="text-decoration: none"><button class="btn btn-lg btn-block w3-red w3-hover-blue">Read More</button></a></p>     --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- testimonial test --}}

            <div class="card col-md-12 d-none d-md-block d-lg-block">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="8000">
                <div class="w-100 carousel-inner mt-5" role="listbox">
                  <?php $i = 0; ?>
                    @foreach ($wedding_solutions as $item)
                    <div class="carousel-item {{$i==1 ? 'active': ''}}">
                      <div class="carousel-caption">
                        <div class="row">
                          <div class="col-sm-3">
                              <img src="{{ asset("wedding_solutions/{$item->id}.{$item->picture}") }}" alt="" class="rounded-circle img-fluid"/>
                          </div>
                          <div class="col-sm-9">
                            <h5 class="card-title text-center" style="font-family: 'Great Vibes', cursive; font-weight: 400; font-size: 25px;">{{ $item->title }}</h5>
                            <p>{{str_limit($item->description,300)}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                </div>

                <div class="float-right navi">
                <a class="" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon ico" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon ico" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
                </div>
              </div>
            </div>
            {{-- testimonial test end --}}
        </div>
    </div>
</section>
{{-- wedding success story end --}}


@include('bgbd.subpage.private-js')
@endsection
