@extends('hasan.master')

@section('content')
<!-- search banner start -->
@include('hasan.subpage.banner-sm')
<!-- search banner end -->

<section class = "pt-5"> {{--class = "pt-5"--}}
  <div class="container">
    {{-- Top menu --}}
    <div class="row">
      <div class="col-sm-12 profile_menu_border">
        <ul class="nav nav-tabs p-4">
          <li class="nav-item pl-3">
            <a href="{{route('users.myprofile')}}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">My Profile</a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ route('user.pending_receive_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest to me Sent</a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ route('user.accepted_receive_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest to me Accepted</a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ route('user.pending_sent_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest by me Receive</a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ route('user.accepted_sent_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest to me Accepted</a>
          </li>
        </ul>
      </div>
    </div>
    {{-- End top menu --}}
    <div class="row pb-5 px-2 px-sm-0 pt-5">
      @include('hasan.subpage.leftmenu')
      <div class="col-sm-9 px-3 pl-sm-5 pb-5 pr-0" style="border: 1px solid  #cccccc;">
        
        <div class="progress mt-5">
          <div class="progress-bar w3-blue" role="progressbar" style="width: {{$complete}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Profile Info currently Completed <span style="float: right;">{{$complete}}/100</span></div>
        </div>

        <!-- Some Code was here value.blade.php -->
        {{-- Faviorate Start --}}
        <div class="col-sm-12">
          <h4>{{ $title }}</h4>
          <hr/>
  
          <div class="row">
            @foreach ($result as $item)
              <div class="col-sm-3 margin-bottom-30">
                <a href="{{ \App\Common::getUserUrl($item->id) }}">
                  <div class="home-porfile">
                    @if($item->picid != '' && file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                      <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                      class="img-fluid" alt="{{ $item->first_name . ' ' . $item->last_name }}" />
                    @else
                      @if ($item->gender == 1)
                        <img src="{{ url('assets/defaults/male.png') }}"
                        class="img-fluid" alt="{{ $item->first_name . ' ' . $item->last_name }}" />
                      @else
                        <img src="{{ url('assets/defaults/female.png') }}"
                        class="img-fluid" alt="{{ $item->first_name . ' ' . $item->last_name }}" />
                      @endif
                    @endif
                    <div class="home-profile-details">
                      <h5>{{ $item->first_name . ' ' . $item->last_name }}</h5>
                      <p>Age: {{ \App\Common::getAge($item->date_of_birth) }} yrs.</p>
                      <p>Height: {{ height($item->height) }}</p>
                      <p>Religion: {{ religion($item->religion) }}</p>
                      <br />
                      {{-- <p align="center">
                        <button type="button" class="btn btn-warning btn-sm btn-delete" name="button" href="delete_{{ $item->id }}">Delete</button>
                      </p> --}}
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
        {{-- Faviorate ends --}}

        {{-- Most View --}}
        <div class="col-sm-12 mt-4">
            <h4>Most viewed profile</h4>
          <hr>
          <div class="row">
            @php $i = 0; @endphp
            @foreach ($users as $item)
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
            <div class="col-lg-4 col-sm-6 col-md-4 pl-sm-0 ml-sm-0 pr-2">
              <div class="card border-0">
                <div class="card-image">
                  @if(isset(Auth::user()->id) && Auth::user()->premium && $item->picid != '' &&
                  file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                  <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}" class="image card-img-top"
                    alt="{{ $name }}" />
                  @elseif(!$item->private && $item->picid != '' &&
                  file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                  <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}" class="image card-img-top"
                    alt="{{ $name }}" />
                  @else
                  @if ($item->gender == 1)
                  <img src="{{ url('assets/defaults/male.png') }}" class="image card-img-top" alt="{{ $name }}" />
                  @else
                  <img src="{{ url('assets/defaults/female.png') }}" class="image card-img-top" alt="{{ $name }}" />
                  @endif
                  @endif
                  <div class="middle">
                    <div class="text">
                      <a href="#" class="activity"><i class="fas fa-thumbs-up add-like inactive"></i></a>
                      <a href="#" class="activity"><i class="fas fa-star add-interest inactive"></i></a>
                      <a href="#" class="activity"><i class="fas fa-phone-alt add-contact inactive"></i></a>
                      <a href="#" class="activity"><i class="fas fa-envelope send-message inactive"></i></a>
                      <a href="#" class="activity"><i class="fas fa-heart add-favourite inactive"></i></a>
                    </div>
                  </div>
                </div>
                <div class="card-body arrival-card pl-0 ml-0">
                  {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}" class="py-0 my-0 profile-title">{{ $name }}</a> --}}
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
          <div class="row">
            <div class="col-sm-12">
              {!! $users->render() !!}
            </div>
          </div>                
        </div>
        {{-- Most view End --}}
        
        {{-- Matched Profile --}}
        <div class="col-sm-12 mt-2">
          <h4>My Matched</h4>
          <hr>
          <div class="row">
            @php $i = 0; @endphp
            @foreach ($value as $item) 
            <div class="col-lg-3 col-sm-6 col-md-4 pl-sm-0 ml-sm-0 pr-2">
              <div class="card border-0">
                <div class="card-image">
                  @if(isset(Auth::user()->id) && Auth::user()->premium && $item->photo != '' &&
                  file_exists($item->photo))
                  <img src="{{ asset($item->photo)  }}" class="image card-img-top"
                    alt="{{ $item->name }}" />
                  @elseif(!$item->private && $item->photo != '' &&
                  file_exists($item->photo))
                  <img src="{{ asset($item->photo)  }}" class="image card-img-top"
                    alt="{{ $item->name }}" />
                  @else
                  @if ($item->gender == 1)
                  <img src="{{ asset('assets/defaults/male.png') }}" class="image card-img-top" alt="{{ $item->name }}" />
                  @else
                  <img src="{{ asset('assets/defaults/female.png') }}" class="image card-img-top" alt="{{ $item->name }}" />
                  @endif
                  @endif
                  {{-- <div class="middle">
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
                </div> --}}
                </div>
                <div class="card-body arrival-card pl-0 ml-0">
                  {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}" class="py-0 my-0 profile-title">{{ $item->name }}</a> --}}
                  <p class="py-0 my-0"><strong>ID: BG-{{ $date->format('ymd').$item->id }}</strong></p>
        
                  <p class="card-text arrival-text p-0 m-0 pb-2">
                    {{ \App\Common::getAge($item->date_of_birth) }} yrs <strong> | </strong>
                    {{ $item->height }} <strong> |
                    </strong> {{ $item->religion }} <strong> | </strong>
                    {{ $item->education }}</p>
                  <a href="{{ \App\Common::getUserUrl($item->id) }}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                    Profile </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>          
        </div>
        {{-- Matched Profile End --}}
      </div>
    </div>
  </div>
</section>
<style>
table tr.table_align td:first-child{
  border-right: none;
}
</style>
@endsection