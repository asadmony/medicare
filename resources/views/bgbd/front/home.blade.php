@extends('bgbd.layouts.master')
@section('content')
  <!-- ################## carousel start ############### -->
  <div class="slide-wrapper">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @php
        $carousel = 1;
        @endphp
        @foreach ($sliders as $slider)
          <div class="carousel-item {{ ($carousel-- == 1)?" active":'' }}">
            <img class="d-block w-100" src="{{ asset("final/images/slider/{$slider->id}.{$slider->image}") }}" alt="{{ $slider->title }}">
          </div>
        @endforeach
      </div>
    </div>

    <div class="small-search">
      <form action="{{ route('search') }}" method="GET" role="form" class="myfontcolor">
        <label>Seeking a </label>
        <select name="gender" class="margin-right-30">
          <option value="">Select</option>
          <option value="1">Male</option>
          <option value="2" selected>Female</option>
        </select>

        <label>Age From </label>
        <select name="agemin" class="slider-search">
          <option value="">Select</option>
          @for ($i=18; $i <= 80; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>

        <label>to </label>
        <select name="agemax" class="margin-right-30">
          <option value="">Select</option>@for ($i=18; $i <= 80; $i++)
            @if($i==30)
              <option selected value="{{ $i }}">{{ $i }}</option>
            @else
              <option value="{{ $i }}">{{ $i }}</option>
            @endif
          @endfor
        </select>

        <label>Religion </label>
        <select name="religion" class="margin-right-30">
          <option value="">Select</option>
          @foreach (religion() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>

        <label>Maritial status</label>
        <select name="marital_status" class="margin-right-30">
          <option value="">Any</option>
          <option value="1">Never Married</option>
          <option value="2">Widowed</option>
          <option value="3">Divorced</option>
        </select>

        <input type="submit" name="" class="btn btn-success home-search btn-white-red" value="Search">

      </form>

    </div>
  </div>
  <!-- ###################### carousel end ################## -->

  <!-- ###################### home profile start ################## -->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <br />
        <h4>Feature Profile</h4>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      @foreach ($featuedProfiles as $item)
        @php
        if ($item->settings_name == 1){
          $name = trim($item->first_name)  ." ". trim($item->last_name);
        }
        elseif ($item->settings_name == 2){
          $name = trim($item->first_name);
        }
        else{
          $name = trim($item->last_name);
        }
        @endphp
        <div class="col-sm">
          <a href="{{ \App\Common::getUserUrl($item->id) }}">
            <div class="home-porfile">
              @if(isset(Auth::user()->id) && Auth::user()->premium && $item->picid != '' && file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                class="img-fluid" alt="{{ $name }}" />
              @elseif(!$item->private && $item->picid != '' && file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                class="img-fluid" alt="{{ $name }}" />
              @else
                @if ($item->gender == 1)
                  <img src="{{ url('assets/defaults/male.png') }}"
                  class="img-fluid" alt="{{ $name }}" />
                @else
                  <img src="{{ url('assets/defaults/female.png') }}"
                  class="img-fluid" alt="{{ $name }}" />
                @endif
              @endif
              <div class="home-profile-details">
                <h5>{{ $name }}</h5>
                <p>Age: {{ \App\Common::getAge($item->date_of_birth) }} yrs.</p>
                <p>Height: {{ height($item->height) }}</p>
                <p>Religion: {{ religion($item->religion) }}. Sect: Sunni</p>
                <p>Education: {{ $item->education_level ?? ' - ' }}</p>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <br />
        <h4>Latest Profile</h4>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      @php
      @endphp
      @foreach ($latestProfiles as $item)
        @php
        if ($item->settings_name == 1){
          $name = trim($item->first_name)  ." ". trim($item->last_name);
        }
        elseif ($item->settings_name == 2){
          $name = trim($item->first_name);
        }
        else{
          $name = trim($item->last_name);
        }
        @endphp
        <div class="col-sm">
          <a href="{{ \App\Common::getUserUrl($item->id) }}">
            <div class="home-porfile">
              @if(isset(Auth::user()->id) && Auth::user()->premium && $item->picid != '' && file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                class="img-fluid" alt="{{ $name }}" />
              @elseif(!$item->private && $item->picid != '' && file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                class="img-fluid" alt="{{ $name }}" />
              @else
                @if ($item->gender == 1)
                  <img src="{{ url('assets/defaults/male.png') }}"
                  class="img-fluid" alt="{{ $name }}" />
                @else
                  <img src="{{ url('assets/defaults/female.png') }}"
                  class="img-fluid" alt="{{ $name }}" />
                @endif

              @endif
              <div class="home-profile-details">
                <h5>{{ $name }}</h5>
                <p>Age: {{ \App\Common::getAge($item->date_of_birth) }} yrs.</p>
                <p>Height: {{ height($item->height) }}</p>
                <p>Religion: {{ religion($item->religion) }}. Sect: Sunni</p>
                <p>Education: {{ $item->education_level ?? ' - ' }}</p>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
  <!-- ###################### home profile end ################## -->

  <!-- ###################### About Message Start ################## -->
  <br />
  <div class="about-message">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h3>The one you are perfect for, is waiting for you to log on.</h3>
        </div>
        <div class="col-sm-5">
          <div class="video-container">
            <iframe style="border:15px solid #e47f8d" src="https://www.youtube.com/embed/hhxFaXaidvA?rel=0" allowfullscreen="" width="100%" height="" frameborder="0"></iframe>
          </div>
        </div>
        <div class="col-sm-7">
          <p>You believe in soulmates, so do we. </p>
          <p>Connect with your perfect one here, on Jeevansathi.</p>
          <br /><br />
          <p>While you do so, we take utmost care of your Privacy &amp; Security. </p>
          <p>We ensure 100% Screening of profiles, Verified Stamp on those </p>
          <p>we've met in person and Advanced Privacy Settings.</p>
          <br />
          <br />
          <a href="" class="btn btn-red">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Register
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- ###################### About Message end ################## -->

@endsection
