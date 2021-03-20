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
            <a href="{{route('users.mydashboard')}}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">My Dashboard</a>
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
      <!-- profile menu section start -->
      <div class="col-sm-9 px-3 pl-sm-5 pb-5 pr-0" style="border: 1px solid  #cccccc;"> 
        <div class="row ">
          <div class="col-sm-12 col-lg-4 py-5 py-sm-0  px-0 mx-0 display_profile">
            <div class="profile-picture">
              @php
              $pic = 0;
              @endphp

              @php
              $pic = 0;
              @endphp
              @if ($photos)
              @foreach ($photos as $photo)
              @if($photo->is_profilepic && file_exists("profiles/pics/{$user->id}/{$photo->extention}"))
              <img src="{{ url("profiles/pics/{$user->id}/{$photo->extention}")  }}" class="img-fluid"
                alt="{{ $user->first_name . ' ' . $user->last_name }}" class="img-fluid  display_image" />
              @php
              $pic = 1;
              break;
              @endphp
              @endif
              @endforeach
              @if (!$pic)
              @if ($user->gender == 1)
              <img src="{{ url('assets/defaults/male.png') }}" class="img-fluid"
                alt="{{ $user->first_name . ' ' . $user->last_name }}" class="img-fluid  display_image" />
              @else
              <img src="{{ url('assets/defaults/female.png') }}" class="img-fluid"
                alt="{{ $user->first_name . ' ' . $user->last_name }}" class="img-fluid  display_image" />
              @endif
              @endif
              @else
              @if ($user->gender == 1)
              <img src="{{ url('assets/defaults/male.png') }}" class="img-fluid"
                alt="{{ $user->first_name . ' ' . $user->last_name }}" class="img-fluid  display_image" />
              @else
              <img src="{{ url('assets/defaults/female.png') }}" class="img-fluid"
                alt="{{ $user->first_name . ' ' . $user->last_name }}" class="img-fluid  display_image" />
              @endif
              @endif

              <div class="display_overlay">
                <span>
                  @if ($user->settings_name == 1)
                  {{ trim($user->first_name) }} {{ trim($user->last_name) }}
                  @elseif ($user->settings_name == 2)
                  {{ trim($user->first_name) }}
                  @else
                  {{ trim($user->last_name) }}
                  @endif
                </span>
                <span>(BG{{ $user->id }})</span>
              </div>              
            </div>
            @if (Auth::user()->featured)
            <div class="d-flex justify-content-center" style="margin-top: 10px;"><a href="{{ route('packages') }}" class="btn btn-danger btn-sm">Upgrade Membership</a>   </div> 
            @endif
            
          </div>
          <div class="col-12 col-sm-12 col-lg-8 px-2 px-sm-3">
            <table class="table table-responsible my_table">

              <tbody class="groom_table">
                <tr class="table_align">
                  <td>
                    <span>Age & Gender: </span>
                    <span>{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years,
                      {{ ($user->gender==1)?"Male":"Female" }}</span>
                  </td>
                </tr>
                <tr class="table_align">
                  <td>
                    <span>Maritial Status: </span>
                    <span>{{ maritalstatus($user->marital_status) }}</span>
                  </td>
                </tr>
                <tr class="table_align">
                  <td>
                    <span>Height: </span>
                    <span>{{ str_ireplace(".", " ", height($user->height)) }}</span>
                  </td>
                </tr>
                <tr class="table_align">
                  <td>
                    <span>Education : </span>
                    <span>
                      {!! isset($education[0]->education_level) ? educationLevel($education[0]->education_level) . "
                      <small>(" . $education[0]->education_area . ")</small>":'N/A' !!}
                    </span>
                  </td>
                </tr>
                <tr class="table_align">
                  <td>
                    <span>Occupation : </span>
                    <span>
                      {!! $user->user_profession_type?(($user->gender ==
                      1)?professionTypeMale($user->user_profession_type):professionTypeFemale($user->user_profession_type))
                      . ' <small>(' . getProfession($user->user_profession_type, $user->user_profession_details) .
                        ')</small>':"N/A" !!}
                    </span>
                  </td>
                </tr>
                <tr class="table_align">
                  <td>
                    <span>Home District : </span>
                    <span>
                      @php
                      if ($user->location_living_country > 0) {
                      if ($user->location_living_country == 1) {
                      $city = $user->location_living_city;

                      if ($user->location_upzila > 0) {
                      $city .= ', ' . \App\Common::upzila($user->location_upzila);

                      }
                      if ($user->location_district > 0) {
                      $city .= ', ' . \App\Common::district($user->location_district);
                      }
                      $city .= '.';
                      } else {
                      $city = $user->location_living_city . ', ' . \App\Common::country($user->location_living_country)
                      . '.';
                      }

                      } else {
                      $city = ' N/A ';
                      }
                      @endphp
                      {{ $city  }}
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- profile section end -->

        <!-- Some Code was here value.blade.php -->
        <!-- about groom start -->

<div class="row pr-sm-3 pt-5">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0	 ">
    <div class="about_groom_absolute">
      <span class="table-header">About {{ ($user->gender == 1)?"Groom":"Bride" }}</span>
      <a href="{{ route('users.profile.basic.edit') }}" class="profile-edit">Edit</a>
    </div>
  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <p>{{ strlen($user->description)>3?$user->description:"Tell you later" }}</p>
  </div>
</div>
<!-- about groom end -->

<!-- Basic Information start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Basic Information</span>
      <a href="{{ route('users.profile.basic.edit') }}" class="profile-edit">Edit</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>Age</b></td>
          <td width='25%'>{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years</td>
          <td width='25%'><b>Blood Group</b></td>
          <td width='25%'>{{ bloodGroups($user->blood_group) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Height</b></td>
          <td width='25%'>{{ str_ireplace(".", " ", height($user->height)) }}</td>
          <td width='25%'><b>Skin Tone</b></td>
          <td width='25%'>{{ skintone($user->skin_tone) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Weight</b></td>
          <td width='25%'>{{ ((int) $user->weight == $user->weight)?(int) $user->weight:$user->weight }} KG</td>
          <td width='25%'><b>Body Type</b></td>
          <td width='25%'>{{ bodytype($user->body_type) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Maritial Status</b></td>
          <td width='25%'>{{ maritalstatus($user->marital_status) }}</td>
          <td width='25%'><b>Personal Value</b></td>
          <td width='25%'>{{ personalValue($user->personal_value) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Children have</b></td>
          <td width='25%'>{{ $user->how_many_children == 0 ? 'None' : $user->how_many_children }}</td>
          <td width='25%'><b>Disability</b></td>
          <td width='25%'>{{ $user->disability == 1 ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Number of children</b></td>
          <td width='25%'>{{ $user->how_many_children == 0 ? 'None' : $user->how_many_children }}</td>
          <td width='25%'><b>Disablity Details</b></td>
          <td width='25%'>{{ ($user->explain_disability)?$user->explain_disability:"N/A" }}</td>
        </tr>
        @if($user->how_many_children)
        <tr>
          <td width='25%'><b>Children live with me:</b></td>
          <td width='25%'>{{ $user->children_living_with_me == 0 ? 'No' : "Yes" }}</td>
          <td width='25%'></td>
          <td width='25%'></td>
        </tr>
        @endif
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        <tr>
          <td width='45%'><b>Age</b></td>
          <td width='50%'>{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years</td>
        </tr>
        <tr>
          <td><b>Blood Group</b></td>
          <td>{{ bloodGroups($user->blood_group) }}</td>
        <tr>
          <td><b>Height</b></td>
          <td>{{ str_ireplace(".", " ", height($user->height)) }}</td>
        </tr>
        <tr>
          <td><b>Skin Tone</b></td>
          <td>{{ skintone($user->skin_tone) }}</td>
        </tr>
        <tr>
          <td><b>Weight</b></td>
          <td>{{ ((int) $user->weight == $user->weight)?(int) $user->weight:$user->weight }} KG</td>
        </tr>
        <tr>
          <td><b>Body Type</b></td>
          <td>{{ bodytype($user->body_type) }}</td>
        </tr>
        <tr>
          <td><b>Maritial Status</b></td>
          <td>{{ maritalstatus($user->marital_status) }}</td>
        </tr>
        <tr>
          <td><b>Personal Value</b></td>
          <td>{{ personalValue($user->personal_value) }}</td>
        </tr>
        <tr>
          <td><b>Children have</b></td>
          <td>{{ $user->how_many_children == 0 ? 'None' : $user->how_many_children }}</td>
        </tr>
        <tr>
          <td><b>Disability</b></td>
          <td>{{ $user->disability == 1 ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><b>Number of children</b></td>
          <td>{{ $user->how_many_children == 0 ? 'None' : $user->how_many_children }}</td>
        </tr>
        <tr>
          <td><b>Disablity Details</b></td>
          <td>{{ ($user->explain_disability)?$user->explain_disability:"N/A" }}</td>
        </tr>
        @if($user->how_many_children)
        <tr>
          <td><b>Children live with me:</b></td>
          <td>{{ $user->children_living_with_me == 0 ? 'No' : "Yes" }}</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<!-- Basic Information end -->

<!-- Contact Information start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Contact Information</span>
      <a href="{{ route('users.profile.contact.edit') }}" class="profile-edit">Edit</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>{{ \App\Common::relatives($user->contact_relation) }}'s Name</b></td>
          <td width='25%'>{{ $user->contact_name }}</td>
          <td width='25%'><b>Email</b></td>
          <td width='25%'>{{ $user->contact_email }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Mobile Number</b></td>
          <td width='25%'>{{ $user->contact_mobile }}</td>
          <td width='25%'><b>Convinient time</b></td>
          <td width='25%'>{{ $user->contact_timetocall }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Present Address</b></td>
          <td width='25%'>{{ $user->contact_present_address }}</td>
          <td width='25%'><b>Permanent Address</b></td>
          <td width='25%'>{{ $user->contact_permanent_address}}</td>
        </tr>
        <tr>
          <td width='25%'><b>Contact Person</b></td>
          <td width='25%'>{{ \App\Common::relatives($user->contact_relation) }}</td>
          <td width='25%'></td>
          <td width='25%'></td>
        </tr>
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody>
        <tr>
          <td width='25%'><b>{{ \App\Common::relatives($user->contact_relation) }}'s Name</b></td>
          <td width='25%'>{{ $user->contact_name }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Email</b></td>
          <td width='25%'>{{ $user->contact_email }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Mobile Number</b></td>
          <td width='25%'>{{ $user->contact_mobile }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Convinient time</b></td>
          <td width='25%'>{{ $user->contact_timetocall }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Present Address</b></td>
          <td width='25%'>{{ $user->contact_present_address }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Permanent Address</b></td>
          <td width='25%'>{{ $user->contact_permanent_address}}</td>
        </tr>
        <tr>
          <td width='25%'><b>Contact Person</b></td>
          <td width='25%'>{{ \App\Common::relatives($user->contact_relation) }}</td>
          <td width='25%'></td>
          <td width='25%'></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Contact Information end -->

<!-- Education start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Education Background</span>
      <a href="{{ route('users.profile.education.create') }}" class="profile-edit">Add</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        <tr>
          <th>Educaiton Level</th>
          <th>Educaiton Area</th>
          <th>Degree</th>
          <th>Institution</th>
          <th>Status</th>
          <th width="30">Action</th>
        </tr>
        @foreach ($education as $edu)
        <tr>
          <td>{!! educationLevel($edu->education_level) !!}</td>
          <td>{!! $edu->education_area !!}</td>
          <td>{!! $edu->degree_name !!}</td>
          <td>
            {!! $edu->institution_name !!}
          </td>
          <td>{!! $edu->status == 1 ?'Currently Studying' : 'Completed' !!}</td>
          <td>
            <a href="{{ route('users.profile.education.edit', $edu->id) }}"><i class="fas fa-edit"></i></a>
            <a href="{{ route('users.profile.education.delete', $edu->id) }}"
              onclick="return confirm('Are you want to delete {!! strtolower(educationLevel($edu->education_level)) !!} education?');"><i
                class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        @php
        $i = 1;
        @endphp
        @foreach ($education as $edu)
        <tr>
          <td>
            <b>Education Level:</b>
          </td>
          <td> {!! educationLevel($edu->education_level) !!}</td>
        </tr>
        <tr>
          <td>
            <b>Educaiton Area:</b>
          </td>
          <td>{!! $edu->education_area !!}</td>
        </tr>
        <tr>
          <td>
            <b>Degree: </b>
          </td>
          <td>{!! $edu->degree_name !!}</td>
        </tr>
        <tr>
          <td>
            <b>Institution:</b>
          </td>
          <td>
            {!! $edu->institution_name !!}
          </td>
        </tr>
        <tr>
          <td>Status: </td>
          <td>{!! $edu->status == 1 ?'Currently Studying' : 'Completed' !!}</td>
        </tr>
        @if (count($education) > $i)
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        @endif
        @php
        $i++
        @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- Education end -->


<!-- Career start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Career Information</span>
      <a href="{{ route('users.profile.profession.edit') }}" class="profile-edit">Edit</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        <tr>
          <th>Profession</th>
          @if($user->user_designation)
          <th>Designation</th>
          @endif
          @if($user->user_org_name)
          <th>Organization</th>
          @endif
          @if ($user->user_other_profession_details)
          <th>Details</th>
          @endif
        </tr>
        <tr>
          <td>
            @if($user->gender == 1)
            {{ professionTypeMale($user->user_profession_type) }}
            @else
            {{ professionTypeFemale($user->user_profession_type) }}
            @endif
            {!! ($user->user_profession_details)?"<small>(".getProfession($user->user_profession_type,
              $user->user_profession_details).")</small>":"" !!}
          </td>
          @if($user->user_designation)
          <td>{{ $user->user_designation }}</td>
          @endif
          @if($user->user_org_name)
          <td>{!! $user->user_org_name !!}</td>
          @endif
          @if($user->user_other_profession_details)
          <td>{{ $user->user_other_profession_details }}</td>
          @endif
        </tr>
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        <tr>
          <td>
            <b>Profession:</b>
          </td>
          <td>
            @if($user->gender == 1)
            {{ professionTypeMale($user->user_profession_type) }}
            @else
            {{ professionTypeFemale($user->user_profession_type) }}
            @endif
            {!! ($user->user_profession_details)?"<small>(".getProfession($user->user_profession_type,
              $user->user_profession_details).")</small>":"" !!}
          </td>
        </tr>
        @if($user->user_designation)
        <tr>
          <td>
            <b>Designation:</b>
          </td>
          <td>{{ $user->user_designation }}</td>
        </tr>
        @endif

        @if($user->user_org_name)
        <tr>
          <td>
            <b>Organigation: </b>
          </td>
          <td>
            {!! $user->user_org_name !!}
          </td>
        </tr>
        @endif

        @if ($user->user_other_profession_details)
        <tr>
          <td>
            <b>Details:</b>
          </td>
          <td>{{ $user->user_other_profession_details }}</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<!-- Career end -->

<!-- Location start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Location Information</span>
      <a href="{{ route('users.profile.location.edit') }}" class="profile-edit">Edit</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        @if ($user->location_living_country > 1)
        <tr>
          <td width='25%'><b>Living Country</b></td>
          <td width='25%'>{{ \App\Common::country($user->location_living_country) }}</td>
          <td width='25%'><b>Living city/area</b></td>
          <td width='25%'>{{ $user->location_living_city }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Immigration Status</b></td>
          <td width='25%'>{{ immigrationStatus($user->location_immigration_status) }}</td>
          <td width='25%'><b>Growing up Country</b></td>
          <td width='25%'>{{ \App\Common::country($user->location_growing_up_country) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Home/District</b></td>
          <td width='25%'>
            {{ ($user->location_district)?\App\Common::district($user->location_district):"N/A" }}
          </td>
          <td width='25%'><b>Home Upazilla/Thana</b></td>
          <td width='25%'>
            {!! \App\Common::upzila($user->location_upzila) !!}
          </td>
        </tr>
        @else
        <tr>
          <td width='25%'><b>Living Country</b></td>
          <td width='25%'>{{ \App\Common::country($user->location_living_country) }}</td>
          <td width='25%'><b>Living city/area</b></td>
          <td width='25%'>{{ $user->location_living_city }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Home/District</b></td>
          <td width='25%'>
            {{ ($user->location_district)?\App\Common::district($user->location_district):"N/A" }}
          </td>
          {{-- <td width='25%'><b>Home Upazilla/Thanas</b></td>
          <td width='25%'>
            {!! \App\Common::upzila($user->location_upzila) !!}
          </td> --}}
        </tr>

        @endif
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        @if ($user->location_living_country > 1)
        <tr>
          <td width='50%'><b>Living Country</b></td>
          <td width='50%'>{{ \App\Common::country($user->location_living_country) }}</td>
        </tr>
        <tr>
          <td width='50%'><b>Living city/area</b></td>
          <td width='50%'>{{ $user->location_living_city }}</td>
        </tr>
        <tr>
          <td width='50%'><b>Immigration Status</b></td>
          <td width='50%'>{{ immigrationStatus($user->location_immigration_status) }}</td>
        </tr>
        <tr>
          <td width='50%'><b>Growing up Country</b></td>
          <td width='50%'>{{ \App\Common::country($user->location_growing_up_country) }}</td>
        </tr>
        <tr>
          <td width='50%'><b>Home/District</b></td>
          <td width='50%'>
            {{ ($user->location_district)?\App\Common::district($user->location_district):"N/A" }}
          </td>
        </tr>
        <tr>
          <td width='50%'><b>Home Upazilla/Thana</b></td>
          <td width='50%'>
            {!! \App\Common::upzila($user->location_upzila) !!}
          </td>
        </tr>
        @else
        <tr>
          <td width='50%'><b>Living Country</b></td>
          <td width='50%'>{{ \App\Common::country($user->location_living_country) }}</td>
        </tr>
        <tr>
          <td width='50%'><b>Living city/area</b></td>
          <td width='50%'>{{ $user->location_living_city }}</td>
        </tr>
        <tr>
          <td width='50%'><b>Home/District</b></td>
          <td width='50%'>
            {{ ($user->location_district)?\App\Common::district($user->location_district):"N/A" }}
          </td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<!-- Location end -->

<!-- Religion and Others start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Religion and Others</span>
      <a href="{{ route('users.profile.religion.edit') }}" class="profile-edit">Edit</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">

      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>Religion</b></td>
          <td width='25%'>{{ religion($user->religion) }}</td>
          <td width='25%'><b>Mother Tongue</b></td>
          <td width='25%'>{{ motherTongue($user->language) }}</td>
        <tr>
          <td width='25%'><b>Sub caste</b></td>
          <td width='25%'>{{ subReligion($user->religion, $user->religion_section) }}</td>
          <td width='25%'><b>Smoke</b></td>
          <td width='25%'>{{ smoke($user->smoke) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Diet</b></td>
          <td width='25%'>{{ diet($user->diet_type) }}</td>
          <td width='25%'><b>Sun Sign</b></td>
          <td width='25%'>{{ sunsign($user->sun_sign) }}</td>
        </tr>

        <tr>
          <td width='25%'><b>Drink</b></td>
          <td width='25%'>{{ drink($user->drink) }}</td>
          <td width='25%'><b>Hobby</b></td>
          <td width='25%'>{{ hobbyType($user->hobby) }}</td>
        </tr>
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>Religion</b></td>
          <td width='25%'>{{ religion($user->religion) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Mother Tongue</b></td>
          <td width='25%'>{{ motherTongue($user->language) }}</td>
        <tr>
          <td width='25%'><b>Sub caste</b></td>
          <td width='25%'>{{ subReligion($user->religion, $user->religion_section) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Smoke</b></td>
          <td width='25%'>{{ smoke($user->smoke) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Diet</b></td>
          <td width='25%'>{{ diet($user->diet_type) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Sun Sign</b></td>
          <td width='25%'>{{ sunsign($user->sun_sign) }}</td>
        </tr>

        <tr>
          <td width='25%'><b>Drink</b></td>
          <td width='25%'>{{ drink($user->drink) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Hobby</b></td>
          <td width='25%'>{{ hobbyType($user->hobby) }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Religion and Others end -->

@if ($user->religion == 1)
<!-- Religious activities for Muslims start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Religious activities</span>
      <a href="{{ route('users.profile.religion_activity.edit') }}" class="profile-edit">Edit</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>Religious Type</b></td>
          <td width='25%'>{{religionType($user->is_religious) }}</td>
          <td width='25%'><b>Saying Prayer</b></td>
          <td width='25%'>{{sayPayer($user->says_payer) }}</td>
        </tr>
        @if ($user->gender == 2)
        <tr>
          <td width='25%'><b>Wearing Hijab/Borka</b></td>
          <td width='25%'>{{ wearHijab($user->wear_hijab) }}</td>
          <td width='25%'><b>Wearing Hijab/Borka after marrige</b></td>
          <td width='25%'>{{ afterMarriage($user->wear_hijab_after_marriage) }}</td>
        </tr>
        @endif
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>Religious Type</b></td>
          <td width='25%'>{{religionType($user->is_religious) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Saying Prayer</b></td>
          <td width='25%'>{{sayPayer($user->says_payer) }}</td>
        </tr>
        @if ($user->gender == 2)
        <tr>
          <td width='25%'><b>Wearing Hijab/Borka</b></td>
          <td width='25%'>{{ wearHijab($user->wear_hijab) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Wearing Hijab/Borka after marrige</b></td>
          <td width='25%'>{{ afterMarriage($user->wear_hijab_after_marriage) }}</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<!-- Religious activities for Muslims end -->
@endif


<!-- Parents Information start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Parents Information</span>
      <a href="{{ route('users.profile.parent.edit') }}" class="profile-edit">Edit</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        <tr>
          <td width='50%' colspan="2"><b class="color-red">Father Information</b></td>
          <td width='50%' colspan="2"><b>Mother Information</b></td>
        </tr>
        <tr>
          <td width='25%'><b>Living Status</b></td>
          <td width='25%'>{{ deadOrAlive($user->father_living_status) }}</td>
          <td width='25%'><b>Living Status</b></td>
          <td width='25%'>{{ deadOrAlive($user->mother_living_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Service Status</b></td>
          <td width='25%'>{{ serviceStatus($user->father_service_status) }}</td>
          <td width='25%'><b>Service Status</b></td>
          <td width='25%'>{{ serviceStatus($user->mother_service_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Profession</b></td>
          <td width='25%'>
            {{ professionTypeMale($user->father_profession) }}
            @if ($user->father_profession_details)
            <small> ({{ $user->father_profession_details }})</small>
            @endif
          </td>
          <td width='25%'><b>Profession</b></td>
          <td width='25%'>
            {{ professionTypeFemale($user->mother_profession) }}
            @if ($user->mother_profession_details)
            <small> ({{ $user->mother_profession_details }})</small>
            @endif
          </td>
        </tr>
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        <tr>
          <td width='50%' colspan="2"><b class="color-red">Father Information</b></td>
        </tr>
        <tr>
          <td width='25%'><b>Living Status</b></td>
          <td width='25%'>{{ deadOrAlive($user->father_living_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Service Status</b></td>
          <td width='25%'>{{ serviceStatus($user->father_service_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Profession</b></td>
          <td width='25%'>
            {{ professionTypeMale($user->father_profession) }}
            @if ($user->father_profession_details)
            <small> ({{ $user->father_profession_details }})</small>
            @endif
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>


        <tr>
          <td width='50%' colspan="2"><b>Mother Information</b></td>
        </tr>
        <tr>
          <td width='25%'><b>Living Status</b></td>
          <td width='25%'>{{ deadOrAlive($user->mother_living_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Service Status</b></td>
          <td width='25%'>{{ serviceStatus($user->mother_service_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Profession</b></td>
          <td width='25%'>
            {{ professionTypeMale($user->mother_profession) }}
            @if ($user->mother_profession_details)
            <small> ({{ $user->mother_profession_details }})</small>
            @endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Parents Information end -->

<!-- Siblings start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Brother & Sister</span>
      <a href="{{ route('users.profile.siblings.edit') }}" class="profile-edit">Edit</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>Number of Brother</b></td>
          <td width='25%'>{{ $user->number_of_brothers }}</td>
          <td width='25%'><b>Number of Sister</b></td>
          <td width='25%'>{{ $user->number_of_sisters }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Of whom Married</b></td>
          <td width='25%'>{{ $user->number_of_brother_married }}</td>

          <td width='25%'><b>Of whom Married</b></td>
          <td width='25%'>{{ $user->number_of_sisters_married }}</td>
        </tr>
        {{-- If use have Brother and Sister --}}
        @if ($user->number_of_sisters > 0 || $user->number_of_brothers > 0)
        @if (count($siblings) < ($user->number_of_brothers + $user->number_of_sisters))
          <tr>
            <td colspan="4">
              <a href="{{ route('users.profile.siblings.create') }}" class="btn btn-info btn-sm float-right">Add
                Brother/Sister </a>
            </td>
          </tr>
          @endif

          @foreach ($siblings as $sibling)
          <tr>
            <td class="mytd" colspan="4">
              <b class="color-red">
                {{ $sibling->gender == 1 ? 'Brother ' : 'Sister ' }}
                {{ $sibling->sibling_position}}
              </b>
              <a href="{{ route('users.profile.siblings.deleteSibling', $sibling->id) }}" class="profile-edit"
                onclick="return confirm('Are you want to delete {{ $sibling->gender == 1 ? 'brother ' : 'sister ' }} information?');"><i
                  class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
          <tr>
            <td width='25%'><b>Profession</b></td>
            <td width='25%'>
              {!! $sibling->sibling_profession?(($sibling->gender ==
              1)?professionTypeMale($sibling->sibling_profession):professionTypeFemale($sibling->sibling_profession)):"N/A"
              !!}
              @if ($sibling->sibling_profession_details)
              <small>({{ $sibling->sibling_profession_details }})</small>
              @endif
            </td>
            <td width='25%'><b>Marital Status</b></td>
            <td width='25%'>{{ ($sibling->marital_status==1)?"Married":"Not Married" }}</td>
          </tr>
          @if ($sibling->marital_status == 1)
          <tr>
            <td width='25%'><b>Spouse' Profession</b></td>
            <td width='25%'>
              {!! $sibling->sibling_spouse_profession?(($sibling->gender !=
              1)?professionTypeMale($sibling->sibling_spouse_profession):professionTypeFemale($sibling->sibling_spouse_profession)):"N/A"
              !!}
              @if ($sibling->sibling_spouse_profession_details)
              <small>({{ $sibling->sibling_spouse_profession_details }})</small>
              @endif
            </td>
            <td width='25%'></td>
            <td width='25%'></td>
          </tr>
          @endif
          @endforeach
          @endif

      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>Number of Brother</b></td>
          <td width='25%'>{{ $user->number_of_brothers }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Number of Sister</b></td>
          <td width='25%'>{{ $user->number_of_sisters }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Of whom Married</b></td>
          <td width='25%'>{{ $user->number_of_brother_married }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Of whom Married</b></td>
          <td width='25%'>{{ $user->number_of_sisters_married }}</td>
        </tr>
        {{-- If use have Brother and Sister --}}
        @if ($user->number_of_sisters > 0 || $user->number_of_brothers > 0)

        @foreach ($siblings as $sibling)
        <tr>
          <td class="mytd" colspan="2">
            <b class="color-red">
              {{ $sibling->gender == 1 ? 'Brother ' : 'Sister ' }}
              {{ $sibling->sibling_position}}
            </b>
          </td>
        </tr>
        <tr>
          <td width='25%'><b>Profession</b></td>
          <td width='25%'>
            {!! $sibling->sibling_profession?(($sibling->gender ==
            1)?professionTypeMale($sibling->sibling_profession):professionTypeFemale($sibling->sibling_profession)):"N/A"
            !!}
            @if ($sibling->sibling_profession_details)
            <small>({{ $sibling->sibling_profession_details }})</small>
            @endif
          </td>
        </tr>
        <tr>
          <td width='25%'><b>Designation</b></td>
          <td width='25%'>{{ $sibling->sibling_designation }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Organization</b></td>
          <td width='25%'>{{ $sibling->sibling_organization }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Marital Status</b></td>
          <td width='25%'>{{ ($sibling->marital_status==1)?"Married":"Not Married" }}</td>
        </tr>
        @if ($sibling->marital_status == 1)
        <tr>
          <td width='25%'><b>Spouse' Profession</b></td>
          <td width='25%'>
            {!! $sibling->sibling_spouse_profession?(($sibling->gender !=
            1)?professionTypeMale($sibling->sibling_spouse_profession):professionTypeFemale($sibling->sibling_spouse_profession)):"N/A"
            !!}
            @if ($sibling->sibling_spouse_profession_details)
            <small>({{ $sibling->sibling_spouse_profession_details }})</small>
            @endif
          </td>
        </tr>
        <tr>
          <td width='25%'><b>Spouse' Designation</b></td>
          <td width='25%'>{{ $sibling->sibling_spouse_designation }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Spouse' Organization</b></td>
          <td width='25%'>{{ $sibling->sibling_spouse_organization }}</td>
        </tr>
        <tr>
          <td width='25%'></td>
          <td width='25%'></td>
        </tr>
        @endif
        @endforeach
        @endif

      </tbody>
    </table>
  </div>
</div>
<!-- Siblings end -->

<!-- Family Background start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Family Background</span>
      <a href="{{ route('users.profile.family_background.edit') }}" class="profile-edit">Edit</a>
    </div>

  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>Family Value</b></td>
          <td width='25%'>{{ familyValue($user->family_value) }}</td>

          <td width='25%'><b>Family Status</b></td>
          <td width='25%'>{{ familyStatus($user->family_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Family Type</b></td>
          <td width='25%'>{{ familyType($user->family_type) }}</td>

          <td width='25%'><b>Annual Income</b></td>
          <td width='25%'>
            @if ($user->annual_min_income == 0)
            Tell you later
            @else
            {{ $user->annual_min_income }} -
            {{ ($user->annual_max_income!=9999999)?$user->annual_max_income:"Above" }}
            @endif
          </td>
        </tr>
        <tr>
          <td width='25%'><b>Land/Flat in Dhaka or near City</b></td>
          <td width='25%'>
            {{ $user->have_land == 2 ? 'Yes':'No' }}
          </td>

          <td width='25%'><b>Property Description </b></td>
          <td width='25%'>
            @php
            if($user->have_land == 2 && $user->land_type){
            $temp_arr = landType();
            $land_type = explode("|", $user->land_type);
            $counter = 0;
            foreach ($land_type as $value) {
            if($counter){
            echo ", ";
            }
            $counter = 1;
            echo $temp_arr[$value];
            }
            }
            else{
            echo "---";
            }
            @endphp
          </td>
        </tr>
        <tr>
          <td class="mytd" colspan="4"><b>More about family</b></td>
        </tr>
        <tr>
          <td colspan="4">
            {{ (strlen($user->family_background) > 2)?$user->family_background:"Tell you latter" }}
          </td>
        </tr>
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        <tr>
          <td width='25%'><b>Family Value</b></td>
          <td width='25%'>{{ familyValue($user->family_value) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Family Status</b></td>
          <td width='25%'>{{ familyStatus($user->family_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Family Type</b></td>
          <td width='25%'>{{ familyType($user->family_type) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Annual Income</b></td>
          <td width='25%'>
            @if ($user->annual_min_income == 0)
            Tell you later
            @else
            {{ $user->annual_min_income }} -
            {{ ($user->annual_max_income!=9999999)?$user->annual_max_income:"Above" }}
            @endif
          </td>
        </tr>
        <tr>
          <td width='25%'><b>Land/Flat in Dhaka or near City</b></td>
          <td width='25%'>
            {{ $user->have_land == 2 ? 'Yes':'No' }}
          </td>
        </tr>
        <tr>
          <td width='25%'><b>Property Description </b></td>
          <td width='25%'>
            @php
            if($user->have_land == 2 && $user->land_type){
            $temp_arr = landType();
            $land_type = explode("|", $user->land_type);
            $counter = 0;
            foreach ($land_type as $value) {
            if($counter){
            echo ", ";
            }
            $counter = 1;
            echo $temp_arr[$value];
            }
            }
            else{
            echo "---";
            }
            @endphp
          </td>
        </tr>
        <tr>
          <td class="mytd" colspan="2"><b>More about family</b></td>
        </tr>
        <tr>
          <td colspan="2">
            {{ (strlen($user->family_background) > 2)?$user->family_background:"Tell you latter" }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Family Background end -->

@if ($user->preference_provided > 0)
<!-- Partner preference start -->
<div class="row pr-sm-3">
  <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 ">
    <div class="about_groom_absolute">
      <span class="table-header">Partner Preference</span>
      <a href="{{ route('users.profile.preference.edit') }}" class="profile-edit">Edit</a>
    </div>
  </div>
  <div class="col-sm-12 px-2 px-sm-0 groom_content">
    <table class="table px-0 table-desktop">
      <tbody class="groom_table">
        <tr>
          <td class="mytd" colspan="4"><b>Basic Information</b></td>
        </tr>
        <tr>
          <td width='25%'><b>Age</b></td>
          <td width='25%'>{{ $user->preference_min_age }} - {{ $user->preference_max_age }} years</td>

          <td width='25%'><b>Maritial Status</b></td>
          <td width='25%'>{{ maritalstatus($user->preference_marital_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Height</b></td>
          <td width='25%'>{{ str_ireplace(".", " ", height($user->preference_min_height)) }} -
            {{ str_ireplace(".", " ", height($user->preference_max_height)) }}</td>

          <td width='25%'><b>Children Allow</b></td>
          <td width='25%'>{{ ($user->preference_children_allow==1)?"Yes":"No" }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Religion</b></td>
          <td width='25%'>{{ religion($user->preference_religion) }}</td>

          <td width='25%'><b>Skin Tone</b></td>
          <td width='25%'>{{ skintonePreference($user->preference_skintone) }}</td>
        </tr>

        <tr>
          <td class="mytd" colspan="4"><b class="color-red">Location Information</b></td>
        </tr>
        <tr>
          <td width='25%'><b>Current Living Country</b></td>
          <td width='25%'>
            @if($user->preference_living_country==0)
            {{ "Any Country" }}
            @else
            {{ extractPipe($countries, $user->preference_living_country) }}
            @endif
          </td>
          <td width='25%'><b>Expected Home District</b></td>
          <td colspan="3">
            @if ($user->preference_home_district == 0)
            {{ "Any District" }}
            @else
            {{ extractPipe($districts, $user->preference_home_district) }}
            @endif
          </td>
        </tr>
        <tr>
          <td class="mytd" colspan="4"><b class="color-red">Education &amp; Career</b></td>
        </tr>
        <tr>
          <td width='25%'><b>Education Level</b></td>
          <td width='25%'>
            @php
            $education = $user->preference_education;
            if($education){
            $count = 0;
            $education = explode("|", $education);
            foreach ($education as $edu) {
            if($count){
            echo ", ";
            }
            echo educationLevel($edu);
            $count = 1;
            }
            }
            else{
            echo "All Education";
            }
            @endphp
          </td>

          <td width='25%'><b>Profession</b></td>
          <td width='25%'>
            @php
            $profession = $user->preference_profession;
            if($profession){
            $count = 0;
            $profession = explode("|", $profession);
            foreach ($profession as $edu) {
            if($count){
            echo ", ";
            }
            echo professionType($edu);
            $count = 1;
            }
            }
            else{
            echo "All Profession";
            }
            @endphp
          </td>
        </tr>


        <tr>
        <tr>
          <td class="mytd" colspan="4">
            <div class="col-sm-12  groom_about_logedin pl-2  pl-sm-0 m-t-15">
              <div class="about_groom_absolute">
                <span class="table-header">More <small>(if any)</small></span>
                <a href="{{ route('users.profile.preference.edit') }}" class="profile-edit">Edit</a>
              </div>
            </div>
          </td>
        </tr>
        <td colspan="4">
          {{ strlen($user->preference_moreinfo) > 3?$user->preference_moreinfo:"Tell you later" }}
        </td>
        </tr>
      </tbody>
    </table>
    <table class="table px-0 table-mobile">
      <tbody class="groom_table">
        <tr>
          <td class="mytd" colspan="2"><b>Basic Information</b></td>
        </tr>
        <tr>
          <td width='25%'><b>Age</b></td>
          <td width='25%'>{{ $user->preference_min_age }} - {{ $user->preference_max_age }} years</td>
        </tr>
        <tr>
          <td width='25%'><b>Maritial Status</b></td>
          <td width='25%'>{{ maritalstatus($user->preference_marital_status) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Height</b></td>
          <td width='25%'>{{ str_ireplace(".", " ", height($user->preference_min_height)) }} -
            {{ str_ireplace(".", " ", height($user->preference_max_height)) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Children Allow</b></td>
          <td width='25%'>{{ ($user->preference_children_allow==1)?"Yes":"No" }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Religion</b></td>
          <td width='25%'>{{ religion($user->preference_religion) }}</td>
        </tr>
        <tr>
          <td width='25%'><b>Skin Tone</b></td>
          <td width='25%'>{{ skintonePreference($user->preference_skintone) }}</td>
        </tr>
        <tr>
          <td width='25%'></td>
          <td width='25%'></td>
        </tr>
        <tr>
          <td class="mytd" colspan="4"><b class="color-red">Location Information</b></td>
        </tr>
        <tr>
          <td width='25%'><b>Current Living Country</b></td>
          <td width='25%'>
            @if($user->preference_living_country==0)
            {{ "Any Country" }}
            @else
            {{ extractPipe($countries, $user->preference_living_country) }}
            @endif
          </td>
        </tr>
        <tr>
          <td><b>Expected Home District</b></td>
          <td>
            @if ($user->preference_home_district == 0)
            {{ "Any District" }}
            @else
            {{ extractPipe($districts, $user->preference_home_district) }}
            @endif
          </td>
        </tr>
        <tr>
          <td class="mytd" colspan="2"><b class="color-red">Education &amp; Career</b></td>
        </tr>
        <tr>
          <td width='25%'><b>Education Level</b></td>
          <td width='25%'>
            @php
            $education = $user->preference_education;
            if($education){
            $count = 0;
            $education = explode("|", $education);
            foreach ($education as $edu) {
            if($count){
            echo ", ";
            }
            echo educationLevel($edu);
            $count = 1;
            }
            }
            else{
            echo "All Education";
            }
            @endphp
          </td>
        </tr>
        <tr>
          <td width='25%'><b>Profession</b></td>
          <td width='25%'>
            @php
            $profession = $user->preference_profession;
            if($profession){
            $count = 0;
            $profession = explode("|", $profession);
            foreach ($profession as $edu) {
            if($count){
            echo ", ";
            }
            echo professionType($edu);
            $count = 1;
            }
            }
            else{
            echo "All Profession";
            }
            @endphp
          </td>
        </tr>

        <tr>
        <tr>
          <td class="mytd" colspan="2"><b>More about partner or partner family</b></td>
        </tr>
        <td colspan="2">
          {{ strlen($user->preference_moreinfo) > 3?$user->preference_moreinfo:"Tell you later" }}
        </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Partner preference end -->
@endif
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