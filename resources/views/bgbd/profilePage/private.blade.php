@extends('final.master')

@section('content')
  <!--Main Content Start -->
  <div class="container">
    <br />
    <div class="row">
      <div class="col-sm-3">
        @include('final.include.submenu')
      </div>
      <div class="col-sm-9 single-profile">
        <div class="profile-border" style="padding: 15px">
          @if($user->premium)
            <img src="{{ asset('final/images/premium.png') }}" alt="Premium Member" class="premium_member_single_profile" title="Premium Member">
            @if($user->verified)
              <img src="{{ asset('final/images/verified.png') }}" alt="Profile Verified" class="premium_member_single_profile" title="Profile Verified" style="right: 65px;">
            @endif
          @else
            @if($user->verified)
              <img src="{{ asset('final/images/verified.png') }}" alt="Profile Verified" class="premium_member_single_profile" title="Profile Verified">
            @endif
          @endif
          <table class="table table-condensed rounded mytable table-desktop">
            <thead>
              <tr>
                <th class="mythead myfirsthead" colspan="5">
                  @if ($user->settings_name == 1)
                    {{ trim($user->first_name) }} {{ trim($user->last_name) }}
                  @elseif ($user->settings_name == 2)
                    {{ trim($user->first_name) }}
                  @else
                    {{ trim($user->last_name) }}
                  @endif
                  <small>(ID: BG{{ $user->id }})</small>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="260" rowspan="6">
                  @php
                  $pic = 0;
                  @endphp

                  @if ($photos)
                    @foreach ($photos as $photo)
                      @if(Auth::user()->premium && $photo->is_profilepic && file_exists("profiles/pics/{$user->id}/{$photo->extention}"))
                        <img src="{{ url('profiles/pics/' . $user->id ) . '/' . $photo->extention  }}"
                        class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                        @php
                        $pic = 1;
                        break;
                        @endphp

                      @elseif(!$photo->private && $photo->is_profilepic && file_exists("profiles/pics/{$user->id}/{$photo->extention}"))
                        <img src="{{ url('profiles/pics/' . $user->id ) . '/' . $photo->extention  }}"
                        class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                        @php
                        $pic = 1;
                        break;
                        @endphp
                      @endif
                    @endforeach
                    @if (!$pic)
                      @if ($user->gender == 1)
                        <img src="{{ url('assets/defaults/male.png') }}"
                        class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                      @else
                        <img src="{{ url('assets/defaults/female.png') }}"
                        class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                      @endif
                    @endif
                  @else
                    @if ($user->gender == 1)
                      <img src="{{ url('assets/defaults/male.png') }}"
                      class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                    @else
                      <img src="{{ url('assets/defaults/female.png') }}"
                      class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                    @endif
                  @endif
                </td>
                <td width=''>Age & Gender</td>
                <td width=''>:</td>
                <td width=''>
                  {{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years, {{ ($user->gender==1)?"Male":"Female" }}
                </td>
                <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  @guest
                    <span class="cursor_pointer need_to_login">Express Interest</span>
                  @else
                    <span class="cursor_pointer {{ ($user->gender == Auth::user()->gender)?"invalid_gender":"add-interest" }} {{ isset($interest->id)?"active":"inactive" }}"  id="int-{{ $user->id }}">{{ isset($interest->id)?"Delete Interest":"Express Interest" }}</span>
                  @endguest
                </td>
              </tr>
              <tr>
                <td width=''>Maritial Status</td>
                <td width=''>:</td>
                <td width=''>{{ maritalstatus($user->marital_status) }}</td>
                <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  @guest
                    <span class="cursor_pointer need_to_login">Contact Details</span>
                  @else
                    <span class="cursor_pointer {{ ($user->gender == Auth::user()->gender)?"invalid_gender":"add-contact" }}" id="con-{{ $user->id }}">Contact Details</span>
                  @endguest
                </td>
              </tr>
              <tr>
                <td width=''>Height</td>
                <td width=''>:</td>
                <td width=''>{{ str_ireplace(".", " ", height($user->height)) }}</td>
                <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  @if(isset($AvailableQuote) && $AvailableQuote)
                    @if($AvailableQuote->daily_message == 0)
                      <span class="cursor_pointer message_limit_reach" alt="You have reached daily message limit">Send a Messsages</span>
                    @elseif($AvailableQuote->send_message == 0)
                      <span class="cursor_pointer message_limit_reach" alt="You need to upgrade your package">Send a Messsages</span>
                    @else
                      <span class="cursor_pointer {{ ($user->gender == Auth::user()->gender)?"invalid_gender":"send-message" }}" id="msg-{{ $user->id }}" >Send a Messsage</span>
                    @endif
                  @else
                    <span class="cursor_pointer message_limit_reach" alt="You need to upgrade your package to send message">Send a Messsages</span>
                  @endguest
                </td>
              </tr>
              <tr>
                <td width=''>Education</td>
                <td width=''>:</td>
                <td width=''>
                  {!! isset($education[0]->education_level) ? educationLevel($education[0]->education_level) . " <small>(" . $education[0]->education_area . ")</small>":'N/A' !!}
                </td>
                <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  @guest
                    <span class="cursor_pointer need_to_login">Add to Favourite</span>
                  @else
                    <span class="cursor_pointer {{ ($user->gender == Auth::user()->gender)?"invalid_gender":"add-favourite" }} {{ isset($favourite->id)?"active":"inactive" }}" id="fav-{{ $user->id }}">
                      {{ isset($favourite->id)?"Delete Favourite":"Add to Favourite" }}
                    </span>
                  @endguest
                </td>
              </tr>
              <tr>
                <td width=''>Occupation</td>
                <td width=''>:</td>
                <td width=''>{!! $user->user_profession_type?(($user->gender == 1)?professionTypeMale($user->user_profession_type):professionTypeFemale($user->user_profession_type)) . ' <small>(' . getProfession($user->user_profession_type, $user->user_profession_details) . ')</small>':"N/A" !!}</td>
                <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  {{-- @guest
                    <span class="cursor_pointer need_to_login">Email to a Friend</span>
                  @else
                    <span class="cursor_pointer" id="email_to_a_friend">Email to a Friend</span>
                  @endguest --}}
                </td>
              </tr>
              <tr>
                <td width=''>Location</td>
                <td width=''>:</td>
                <td width=''>
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
                      $city = $user->location_living_city . ', ' . \App\Common::country($user->location_living_country) . '.';
                    }

                  } else {
                    $city = '  N/A ';
                  }
                  @endphp
                  @if (Auth::user()->premium)
                    {{ $city  }}
                  @else
                    <span class="badge badge-danger">Premium member only</span>
                  @endif

                </td>
                <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  {{-- @guest
                    <span class="cursor_pointer need_to_login">Print this Profile</span>
                  @else
                    <span class="cursor_pointer" id="print_the_profile">Print this Profile</span>
                  @endguest --}}
                </td>
              </tr>
            </tbody>
          </table>

          <table class="table table-condensed rounded mytable table-mobile">
            <thead>
              <tr>
                <th class="mythead myfirsthead">
                  @if ($user->settings_name == 1)
                    {{ trim($user->first_name) }} {{ trim($user->last_name) }}
                  @elseif ($user->settings_name == 2)
                    {{ trim($user->first_name) }}
                  @else
                    {{ trim($user->last_name) }}
                  @endif
                  <small>(ID: BG{{ $user->id }})</small>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  @php
                  $pic = 0;
                  @endphp

                  @if ($photos)
                    @foreach ($photos as $photo)
                      @if($photo->is_profilepic && file_exists("profiles/pics/{$user->id}/{$photo->extention}"))
                        <img src="{{ url('profiles/pics/' . $user->id ) . '/' . $photo->extention  }}"
                        class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                        @php
                        $pic = 1;
                        break;
                        @endphp
                      @endif
                    @endforeach
                    @if (!$pic)
                      @if ($user->gender == 1)
                        <img src="{{ url('assets/defaults/male.png') }}"
                        class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                      @else
                        <img src="{{ url('assets/defaults/female.png') }}"
                        class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                      @endif
                    @endif
                  @else
                    @if ($user->gender == 1)
                      <img src="{{ url('assets/defaults/male.png') }}"
                      class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                    @else
                      <img src="{{ url('assets/defaults/female.png') }}"
                      class="img-fluid" alt="{{ $user->first_name . ' ' . $user->last_name }}" width="240" />
                    @endif
                  @endif
                </td>
              </tr>
              <tr>
                <td width=''><b>Age & Gender:</b>
                  {{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years, {{ ($user->gender==1)?"Male":"Female" }}
                </td>
              </tr>

              <tr>
                <td width=''>
                  <b>Maritial Status:</b> {{ maritalstatus($user->marital_status) }}
                </td>
              </tr>
              <tr>
                <td width=''>
                  <b>Height:</b> {{ str_ireplace(".", " ", height($user->height)) }}
                </td>
              </tr>
              <tr>
                <td width=''>
                  <b>Education:</b>
                  {!! isset($education[0]->education_level) ? educationLevel($education[0]->education_level) . " <small>(" . $education[0]->education_area . ")</small>":'N/A' !!}
                </td>
              </tr>

              <tr>
                <td width=''>
                  <b>Occupation: </b>
                  {!! $user->user_profession_type?(($user->gender == 1)?professionTypeMale($user->user_profession_type):professionTypeFemale($user->user_profession_type)) . ' <small>(' . getProfession($user->user_profession_type, $user->user_profession_details) . ')</small>':"N/A" !!}
                </td>
              </tr>
              <tr>
                <td width=''>
                  <b>Location:</b>
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
                      $city = $user->location_living_city . ', ' . \App\Common::country($user->location_living_country) . '.';
                    }

                  } else {
                    $city = '  N/A ';
                  }
                  @endphp
                  @if (Auth::user()->premium)
                    {{ $city  }}
                  @else
                    <span class="badge badge-danger">Premium member only</span>
                  @endif
                </td>
              </tr>
              <tr>
                <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  <b>
                    @guest
                      <span class="cursor_pointer need_to_login">Express Interest</span>
                    @else
                      <span class="cursor_pointer add-interest"  id="int-{{ $user->id }}">Express Interest</span>
                    @endguest
                  </b>
                </td>
              </tr>
              <tr>
                <td>
                  <img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  <span class="cursor_pointer need_to_login"><b>Contact Details</b></span>
                </td>
              </tr>
              <tr>
                <td width=''>
                  <img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  <span class="cursor_pointer need_to_login"><b>Send a Messsages</b></span>
                </td>
              </tr>
              <tr>
                <td width=''>
                  <img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  <b>
                    @guest
                      <span class="cursor_pointer need_to_login">Add to Favourites</span>
                    @else
                      <span class="cursor_pointer add-favourite" id="fav-{{ $user->id }}">Add to Favourites</span>
                    @endguest
                  </b>
                </td>
              </tr>

              <tr>
                <td width=''>
                  {{-- <img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  <b>
                    @guest
                      <span class="cursor_pointer need_to_login">Print this Profile</span>
                    @else
                      <span class="cursor_pointer" id="print_the_profile">Print this Profile</span>
                    @endguest
                  </b> --}}
                </td>
              </tr>
              <tr>
                <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt="">
                  {{-- <b>
                    @guest
                      <span class="cursor_pointer need_to_login">Email to a Friend</span>
                    @else
                      <span class="cursor_pointer" id="email_to_a_friend">Email to a Friend</span>
                    @endguest
                  </b> --}}
                </td>
              </tr>
            </tbody>
          </table>

          <table class="table table-condensed rounded mytable table-desktop">
            <thead>
              <tr>
                <th colspan="4" class="mythead">About {{ ($user->gender == 1)?"Groom":"Bride" }} </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="4">{{ $user->description }}</td>
              </tr>
            </tbody>
          </table>

          <table class="table table-condensed rounded mytable table-desktop">
            <thead>
              <tr>
                <th colspan="4" class="mythead">Basic Information</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width='25%'><b>Age</b></td>
                <td width='25%'>{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years</td>
                <td width='25%'><b>Blood Group</b></td>
                <td width='25%'>{{ bloodGroups($user->blood_group) }}</td>
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

            <table class="table table-condensed rounded mytable table-mobile">
              <thead>
                <tr>
                  <th colspan="2" class="mythead">Basic Information </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width='25%'><b>Age</b></td>
                  <td width='25%'>{{ \Carbon\Carbon::parse($user->date_of_birth)->age }} years</td>
                </tr>
                <tr>
                  <td width='25%'><b>Blood Group</b></td>
                  <td width='25%'>{{ bloodGroups($user->blood_group) }}</td>
                  <tr>
                    <td width='25%'><b>Height</b></td>
                    <td width='25%'>{{ str_ireplace(".", " ", height($user->height)) }}</td>
                  </tr>
                  <tr>
                    <td width='25%'><b>Skin Tone</b></td>
                    <td width='25%'>{{ skintone($user->skin_tone) }}</td>
                  </tr>
                  <tr>
                    <td width='25%'><b>Weight</b></td>
                    <td width='25%'>{{ ((int) $user->weight == $user->weight)?(int) $user->weight:$user->weight }} KG</td>
                  </tr>
                  <tr>
                    <td width='25%'><b>Body Type</b></td>
                    <td width='25%'>{{ bodytype($user->body_type) }}</td>
                  </tr>
                  <tr>
                    <td width='25%'><b>Maritial Status</b></td>
                    <td width='25%'>{{ maritalstatus($user->marital_status) }}</td>
                  </tr>
                  <tr>
                    <td width='25%'><b>Personal Value</b></td>
                    <td width='25%'>{{ personalValue($user->personal_value) }}</td>
                  </tr>
                  <tr>
                    <td width='25%'><b>Children have</b></td>
                    <td width='25%'>{{ $user->how_many_children == 0 ? 'None' : $user->how_many_children }}</td>
                  </tr>
                  <tr>
                    <td width='25%'><b>Disability</b></td>
                    <td width='25%'>{{ $user->disability == 1 ? 'Yes' : 'No' }}</td>
                  </tr>
                  <tr>
                    <td width='25%'><b>Number of children</b></td>
                    <td width='25%'>{{ $user->how_many_children == 0 ? 'None' : $user->how_many_children }}</td>
                  </tr>
                  <tr>
                    <td width='25%'><b>Disablity Details</b></td>
                    <td width='25%'>{{ ($user->explain_disability)?$user->explain_disability:"N/A" }}</td>
                  </tr>
                  @if($user->how_many_children)
                    <tr>
                      <td width='25%'><b>Children live with me:</b></td>
                      <td width='25%'>{{ $user->children_living_with_me == 0 ? 'No' : "Yes" }}</td>
                    </tr>
                  @endif
                </tbody>
              </table>




              <table class="table table-condensed rounded mytable table-desktop">
                <tr>
                  <th colspan="6" class="mythead">Education</th>
                </tr>
                <tr>
                  <th>Educaiton Level</th>
                  <th>Educaiton Area</th>
                  <th>Degree</th>
                  <th>Institution</th>
                  <th>Status</th>
                </tr>
                @foreach ($education as $edu)
                  <tr>
                    <td>{!! educationLevel($edu->education_level) !!}</td>
                    <td>{!! $edu->education_area !!}</td>
                    <td>{!! $edu->degree_name !!}</td>
                    <td>{!! Auth::user()->premium?$edu->institution_name:'<span class="badge badge-danger">Premium member only</span>' !!}</td>
                    <td>{!! $edu->status == 1 ?'Currently Studying' : 'Completed' !!}</td>
                  </tr>
                @endforeach
              </table>

              <table class="table table-condensed rounded mytable table-mobile">
                <tr>
                  <th class="mythead" colspan="2">Education</th>
                </tr>
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
                      {!! Auth::user()->premium?$edu->institution_name:'<span class="badge badge-danger">Premium member only</span>' !!}
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
                </table>

                <table class="table table-condensed rounded mytable table-desktop">
                  <tr>
                    <th colspan="5" class="mythead">Career</th>
                  </tr>
                  <tr>
                    <th>Profession</th>
                    @if($user->user_designation)
                      <th>Designation</th>
                    @endif
                    @if($user->user_org_name)
                      <th>Organigation</th>
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
                      {!! ($user->user_profession_details)?"<small>(".getProfession($user->user_profession_type, $user->user_profession_details).")</small>":"" !!}
                    </td>
                    @if($user->user_designation)
                      <td>{{ $user->user_designation }}</td>
                    @endif
                    @if($user->user_org_name)
                      <td>{!! Auth::user()->premium?$user->user_org_name:'<span class="badge badge-danger">Premium member only</span>' !!}</td>
                    @endif
                    @if($user->user_other_profession_details)
                      <td>{{ $user->user_other_profession_details }}</td>
                    @endif
                  </tr>
                </table>

                <table class="table table-condensed rounded mytable table-mobile">
                  <tr>
                    <th colspan="5" class="mythead">
                      <b>Career</b>
                    </th>
                  </tr>
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
                      {!! ($user->user_profession_details)?"<small>(".getProfession($user->user_profession_type, $user->user_profession_details).")</small>":"" !!}
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
                        {!! Auth::user()->premium?$user->user_org_name:'<span class="badge badge-danger">Premium member only</span>' !!}
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
                </table>


                <table class="table table-condensed rounded mytable table-desktop">
                  <thead>
                    <tr>
                      <th colspan="4" class="mythead">Location</th>
                    </tr>
                  </thead>
                  <tbody>
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
                        <td width='25%'>{!! Auth::user()->premium?\App\Common::upzila($user->location_upzila):'<span class="badge badge-danger">Premium member only</span>' !!}</td>
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
                        <td width='25%'><b>Home Upazilla/Thana</b></td>
                        <td width='25%'>{!! Auth::user()->premium?\App\Common::upzila($user->location_upzila):'<span class="badge badge-danger">Premium member only</span>' !!}</td>
                      </tr>

                    @endif
                  </tbody>
                </table>

                <table class="table table-condensed rounded mytable table-mobile">
                  <thead>
                    <tr>
                      <th colspan="2" class="mythead">Location</th>
                    </tr>
                  </thead>
                  <tbody>
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
                        <td width='50%'>{!! Auth::user()->premium?\App\Common::upzila($user->location_upzila):'<span class="badge badge-danger">Premium member only</span>' !!}</td>
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
                      <tr>
                        <td width='50%'><b>Home Upazilla/Thana</b></td>
                        <td width='50%'>{!! Auth::user()->premium?\App\Common::upzila($user->location_upzila):'<span class="badge badge-danger">Premium member only</span>' !!}</td>
                      </tr>

                    @endif
                  </tbody>
                </table>

                <table class="table table-condensed rounded mytable table-desktop">
                  <thead>
                    <tr>
                      <th colspan="4" class="mythead">Religion and Others</th>
                    </tr>
                  </thead>
                  <tbody>
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

                  <table class="table table-condensed rounded mytable table-mobile">
                    <thead>
                      <tr>
                        <th colspan="2" class="mythead">Religion and Others</th>
                      </tr>
                    </thead>
                    <tbody>
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

                    @if ($user->religion == 1)
                      <table class="table table-condensed rounded mytable table-desktop">
                        <thead>
                          <tr>
                            <th colspan="4" class="mythead">Religious activities for Muslims</th>
                          </tr>
                        </thead>
                        <tbody>
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
                      <table class="table table-condensed rounded mytable table-mobile">
                        <thead>
                          <tr>
                            <th colspan="2" class="mythead">Religious activities for Muslims</th>
                          </tr>
                        </thead>
                        <tbody>
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
                    @endif

                    {{-- Family --}}
                    <table class="table table-condensed rounded mytable table-desktop">
						<thead>
                          <tr>
                            <th colspan="4" class="mythead">Parents Information</th>
                          </tr>
                        </thead>
                      <tbody>
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

                    <table class="table table-condensed rounded mytable table-mobile">

                      <tbody>
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

                    {{-- Brother and Sister --}}
                    <table class="table table-condensed rounded mytable table-desktop">

                      <tbody>
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
                          @foreach ($siblings as $sibling)
                            <tr>
                              <td class="mytd" colspan="4">
                                <b class="color-red">
                                  {{ $sibling->gender == 1 ? 'Brother ' : 'Sister ' }}
                                  {{ $sibling->sibling_position}}
                                </b>

                              </td>
                            </tr>
                            <tr>
                              <td width='25%'><b>Profession</b></td>
                              <td width='25%'>
                                {!! $sibling->sibling_profession?(($sibling->gender == 1)?professionTypeMale($sibling->sibling_profession):professionTypeFemale($sibling->sibling_profession)):"N/A" !!}
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
                                  {!! $sibling->sibling_spouse_profession?(($sibling->gender != 1)?professionTypeMale($sibling->sibling_spouse_profession):professionTypeFemale($sibling->sibling_spouse_profession)):"N/A" !!}
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

                    <table class="table table-condensed rounded mytable table-mobile">
                      <tbody>
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
                                {!! $sibling->sibling_profession?(($sibling->gender == 1)?professionTypeMale($sibling->sibling_profession):professionTypeFemale($sibling->sibling_profession)):"N/A" !!}
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
                                  {!! $sibling->sibling_spouse_profession?(($sibling->gender != 1)?professionTypeMale($sibling->sibling_spouse_profession):professionTypeFemale($sibling->sibling_spouse_profession)):"N/A" !!}
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

                    {{-- Family --}}
                    <table class="table table-condensed rounded mytable table-desktop">
                      <thead>
                        <tr>
                          <th colspan="4" class="mythead">Family Background</th>
                        </tr>
                      </thead>
                      <tbody>
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
                              {{ $user->annual_min_income }} - {{ ($user->annual_max_income!=9999999)?$user->annual_max_income:"Above" }}
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
                              echo  "---";
                            }
                            @endphp
                          </td>
                        </tr>
						<tr>
					<td class="mytd" colspan="4"><b>More about family</b></td>
				  </tr>
                        <tr>
                          <td colspan="4">
                            {{ $user->family_background }}
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <table class="table table-condensed rounded mytable table-mobile">
                      <thead>
                        <tr>
                          <th colspan="2" class="mythead">Family Background</th>
                        </tr>
                      </thead>
                      <tbody>
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
                              {{ $user->annual_min_income }} - {{ ($user->annual_max_income!=9999999)?$user->annual_max_income:"Above" }}
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
                              echo  "---";
                            }
                            @endphp
                          </td>
                        </tr>
						<tr>
					<td class="mytd" colspan="2"><b>More about family</b></td>
				  </tr>
                        <tr>
                          <td colspan="2">
                            {{ $user->family_background }}
                          </td>
                        </tr>
                      </tbody>
                    </table>


                    @if ($user->preference_provided > 0)
                      <table class="table table-condensed rounded mytable table-desktop">
                          <thead>
                            <tr>
                              <th colspan="4" class="mythead">Partner preference </th>
                            </tr>
                          </thead>
                          <tbody>

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
                              <td width='25%'>{{ str_ireplace(".", " ", height($user->preference_min_height)) }} - {{ str_ireplace(".", " ", height($user->preference_max_height)) }}</td>

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
                                <td class="mytd" colspan="4"><b>More about partner or partner family</b></td>
                              </tr>
                              <td colspan="4">
                                {{ strlen($user->preference_moreinfo) > 3?$user->preference_moreinfo:"Tell you later" }}
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table class="table table-condensed rounded mytable table-mobile">
                          <thead>
                            <tr>
                              <th colspan="2" class="mythead">Partner preference </tr>
                              </thead>
                              <tbody>
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
                                  <td width='25%'>{{ str_ireplace(".", " ", height($user->preference_min_height)) }} - {{ str_ireplace(".", " ", height($user->preference_max_height)) }}</td>
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

                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <input type="hidden" id="rid" value="{{ $user->id }}">

                <script type="text/javascript">
                $(document).ready(function() {
                  $("body").on('click', '.invalid_gender', function(event) {
                    event.preventDefault();
                    $("#invalid_alert_msg").text("You can't not process because of same gender");
                    $('#invalid_alert').modal('toggle');
                  });
                  /*  #################  Express Interest ################# */
                  $("body").on("click", ".add-interest", function(event){
                    var ids = $(this).attr("id");
                    ids = parseInt(ids.substr(4));

                    var formData = {
                      "_token": $("meta[name='csrf-token']").attr("content"),
                      "rid": ids
                    };
                    if($(this).hasClass('inactive')){
                      $.ajax({
                        url: "{{ route('express_interest_available') }}",
                        type: 'post',
                        data: formData,
                        context:this,
                        success: function(response){
                          ////response = JSON.parse(response);
                          if(parseInt(response['msg'])){
                            $("#add-interest-id").val(ids);
                            $("#interest-available").text("Total express interest left: " + response['tRemain'] + " and daily express interest left:" +  response['dRemain']);
                            $('#add-interest-modal').modal('toggle');
                          }
                          else{
                            $("#invalid_alert_msg").text(response['status']);
                            $('#invalid_alert').modal('toggle');
                          }
                        }
                      });
                    }
                    else{
                      if (!confirm("Do you want to delete interest?")){
                        return false;
                      }
                      $.ajax({
                        url: "{{ route('express_delete') }}",
                        type: 'post',
                        data: formData,
                        context:this,
                        success: function(response){
                          $("#alert-available").hide();
                          $("#valid_alert_msg").text(response);
                          $('#valid_alert').modal('toggle');
                          $(this).removeClass('active');
                          $(this).addClass('inactive');
                          $(this).text("Express Interest");
                        }
                      });
                    }
                  });

                  $("#add-interest-send").click(function(event) {
                    var ids = $("#add-interest-id").val();


                    var formData = {
                      "_token": $("meta[name='csrf-token']").attr("content"),
                      "rid": ids,
                      "message": $('input[name=msg-text]:checked').val()
                    };

                    $.ajax({
                      url: "{{ route('express_interest') }}",
                      type: 'post',
                      data: formData,
                      context: this,
                      success: function(response){
                        $("#alert-available").hide();
                        $('#add-interest-modal').modal('toggle');
                        $("#valid_alert_msg").text(response);
                        $('#valid_alert').modal('toggle');
                        $("#int-"+ids).removeClass('inactive');
                        $("#int-"+ids).addClass('active');
                        $("#int-"+ids).text("Delete Interest");
                      }
                    });
                  });


                  /*  #################  Contact Details ################# */
                  $(".add-contact").click(function(event) {
                    var ids = $(this).attr("id");
                    ids = parseInt(ids.substr(4));
                    var formData = {
                      "_token": $("meta[name='csrf-token']").attr("content"),
                      "rid": ids
                    };

                    $.ajax({
                      url: "{{ route('contact_details') }}",
                      type: 'post',
                      context:this,
                      data: formData,
                      success: function(response){
                        ////response = JSON.parse(response);
                        if(parseInt(response['msg'])){
                          $("#bride_groom_gurdian_name").text(response['info']['contact_name']);
                          $("#bride_groom_gurdian_email").text(response['info']['contact_email']);
                          $("#bride_groom_contact").text(response['info']['mobile']);
                          $("#gurdian_contact").text(response['info']['contact_mobile']);

                          if(parseInt(response['details_address']) == 2){
                            $("#present_address").text(response['info']['contact_present_address']);
                            $("#permanent_address").text(response['info']['contact_permanent_address']);
                            $("#pp-address-" + ids).hide();
                            $("#pp-address-" + ids).text("");
                            $(".details_address").show();

                          }
                          else if(parseInt(response['details_address']) == 1){
                            $("#pp-address-" + ids).show();
                            $("#pp-address-" + ids).text("Request already sent for Present and Permanent address.");
                            $(".details_address").hide();
                          }
                          else{
                            $("#pp-address-" + ids).show();
                            $(".details_address").hide();
                          }


                          $('#modal_contact_details').modal('toggle');
                          $("#contact-details-name").text("Contact Details of " + $("#name-"+ids).text());
                          $("#remain-contact-details").text("You have " + response['available'] + " Direct Contact Info left");
                        }
                        else{
                          $("#invalid_alert_msg").text(response['status']);
                          $('#invalid_alert').modal('toggle');
                        }
                      }
                    });
                  });

                  $("body").on('click', '.pp-address', function(event) {
                    if($(this).text() == "Request already sent for Present and Permanent address."){
                      event.preventDefault();
                    }
                    else{
                      var ids = $(this).attr("id");
                      ids = parseInt(ids.substr(11));
                      var formData = {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        "rid": ids
                      };
                      $.ajax({
                        url: "{{ route('present_permanent_address') }}",
                        type: 'post',
                        data: formData,
                        success: function(response){
                          $('#valid_alert_msg, #pp-address-'+ids).text("Present and Permanent address request sent successfully.");
                        }
                      });
                    }
                  });

                  $(".send-message").click(function(event) {
                    var ids = $(this).attr("id");
                    ids = parseInt(ids.substr(4));
                    $("#send-message-name").text("Send message to " + $("#name-"+ids).text());
                    $("input[name='msgId']").val(ids);


                    var formData = {
                      "_token": $("meta[name='csrf-token']").attr("content")
                    };

                    $.ajax({
                      url: "{{ route('check_message_available') }}",
                      type: 'post',
                      data: formData,
                      success: function(response){
                        ////response = JSON.parse(response);
                        if(parseInt(response['msg'])){
                          $('#message_modal').modal('toggle');
                          $('#message-available').text("Total message left: " + response['tRemain'] + " and Daily message left: " +  response['dRemain']);
                        }
                        else{
                          $('#invalid_alert').modal('toggle');
                          $('#invalid_alert_msg').text(response['status']);
                        }
                      }
                    });
                  });

                  $("#send_a_message").click(function(event) {
                    if($("input[name='title']").val() == ""){
                      alert("Please write title");
                      event.preventDefault();
                      return;
                    }
                    if($("textarea[name='message']").val() == ""){
                      alert("Please write your message");
                      event.preventDefault();
                      return;
                    }

                    var formData = {
                      "_token": $("meta[name='csrf-token']").attr("content"),
                      "rid": $("input[name='msgId']").val(),
                      "title": $("input[name='title']").val(),
                      "message": $("textarea[name='message']").val()
                    };

                    $.ajax({
                      url: "{{ route('send_message') }}",
                      type: 'post',
                      data: formData,
                      success: function(response){
                        $('#message_modal').modal('hide');
                        $("#valid_alert_msg").text(response);
                        $('#valid_alert').modal('toggle');
                        $("input[name='title']").val("");
                        $("textarea[name='message']").val("");
                        $("#alert-available").hide();
                      }
                    });
                  });

                  $("body").on("click", ".add-favourite", function(event){
                    var ids = $(this).attr("id");
                    ids = parseInt(ids.substr(4));
                    var formData = {
                      "_token": $("meta[name='csrf-token']").attr("content"),
                      "rid": ids
                    };

                    if($(this).hasClass('inactive')){
                      $.ajax({
                        url: "{{ route('add_favourites') }}",
                        type: 'post',
                        data: formData,
                        context:this,
                        success: function(response){
                          ////response = JSON.parse(response);
                          if(parseInt(response['msg'])){
                            $("#valid_alert_msg").text(response['status']);
                            $('#valid_alert').modal('toggle');
                            $("#alert-available").show();
                            $("#alert-available").text("You have " + response['available'] + " favourites left.");
                            $(this).text('Delete Favourite');
                            $(this).removeClass('inactive');
                            $(this).addClass('active');
                          }
                          else{
                            $("#invalid_alert_msg").text(response['status']);
                            $('#invalid_alert').modal('toggle');
                          }
                        }
                      });
                    }
                    else{
                      if (!confirm("Do you want to delete favorite?")){
                        return false;
                      }
                      $.ajax({
                        url: "{{ route('delete_favourites') }}",
                        type: 'post',
                        data: formData,
                        context:this,
                        success: function(response){
                          $("#alert-available").hide();
                          $("#valid_alert_msg").text(response);
                          $('#valid_alert').modal('toggle');
                          $(this).text('Add to Favourite');
                          $(this).removeClass('active');
                          $(this).addClass('inactive');
                        }
                      });
                    }
                  });

                  $(".add-like").click(function(event) {
                    var ids = $(this).attr("id");
                    ids = parseInt(ids.substr(4));
                    var formData = {
                      "_token": $("meta[name='csrf-token']").attr("content"),
                      "rid": ids
                    };

                    $.ajax({
                      url: "{{ route('like_profile') }}",
                      type: 'post',
                      data: formData,
                      success: function(response){
                        $("#valid_alert_msg").text("Thank you for like this profile.");
                        $('#valid_alert').modal('toggle');
                        $("#alert-available").hide();
                      }
                    });
                  });


                  $(".message_limit_reach").click(function(event) {
                    $("#invalid_alert_msg").text($(".message_limit_reach").attr("alt"));
                    $('#invalid_alert').modal('toggle');
                  });

                });

                </script>


                <!-- The Modal -->
                <div class="modal fade" id="modal_contact_details">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title" id="contact-details-name"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <p id='remain-contact-details' class="alert alert-success"></p>
                        <table class="table table-striped">
                          <tr>
                            <td width="40%">Gurdian Name: </td>
                            <td id="bride_groom_gurdian_name"></td>
                          </tr>
                          <tr>
                            <td width="40%">Gurdian Email: </td>
                            <td id="bride_groom_gurdian_email"></td>
                          </tr>
                          <tr>
                            <td width="40%">Contact Number: </td>
                            <td id="bride_groom_contact"></td>
                          </tr>
                          <tr>
                            <td>Gurdian Contact: </td>
                            <td id="gurdian_contact"></td>
                          </tr>
                          <tr class="details_address">
                            <td>Present Address: </td>
                            <td id="present_address"></td>
                          </tr>
                          <tr class="details_address">
                            <td>Permanent Address: </td>
                            <td id="permanent_address"></td>
                          </tr>
                        </table>
                        <hr>
                        <button type="button" class="btn btn-success btn-sm pp-address" id="pp-address-{{ $user->id }}">Send request for Present and Permanent Address</button>
                      </div>


                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                    </div>
                  </div>
                </div>


                <!-- Express Interest Modal -->
                <div class="modal fade" id="add-interest-modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form class="" action="index.html" method="post">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title" id="send-message-name"></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <p class="alert alert-success" id="interest-available"></p>
                          <input type="hidden" id="add-interest-id" >
                          <div class="form-group">
                            <input type="radio" name="msg-text" value="I like your profile and would like to communicate, let me know your interest at the earliest" checked>
                            <small>I  like your profile and would like to communicate, let me know your interest at the earliest</small>
                          </div>
                          <div class="form-group">
                            <input type="radio" name="msg-text" value="I am interested and serious about your profile. If you are interested, let me know your interest at the earliest">
                            <small>
                              I am interested and serious about your profile. If you are interested, let me know your interest at the earliest
                            </small>
                          </div>
                          <div class="form-group">
                            <input type="radio" name="msg-text" value="My family and I like your profile. we would like to take this foward with your parents/guardian.">
                            <small>My family and I like your profile. we would like to take this foward with your parents/guardian.</small>
                          </div>
                          <div class="form-group">
                            <input type="radio" name="msg-text" value="I have gone through your details and found your profile to be a good match. Please contact us to proceed further.">
                            <small>I have gone through your details and found your profile to be a good match. Please contact us to proceed further.</small>
                          </div>
                          <div class="form-group">
                            <input type="radio" name="msg-text" value="">
                            <small>None(send interest without a message)</small>
                          </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-info" id="add-interest-send">Send Interest</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


                <!-- The Message Modal -->
                <div class="modal fade" id="message_modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form class="" action="index.html" method="post">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title" id="send-message-name"></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <p class="alert alert-success" id="message-available"></p>
                          <div class="form-group">
                            <input type="hidden" name="msgId" >
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title">
                          </div>
                          <div class="form-group">
                            <label>Message</label>
                            <textarea required name="message" class="form-control" placeholder="Write your message here"></textarea>
                          </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-info" id="send_a_message">Send</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="valid_alert">
                  <div class="modal-dialog" style="top: 25%">
                    <div class="modal-content">
                      <div class="modal-body">
                        <i class="far fa-check-circle fa-3x"></i>
                        <p id="valid_alert_msg" align="center"></p>
                        <p class="alert alert-success" id="alert-available"></p>
                        <br />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="invalid_alert">
                  <div class="modal-dialog" style="top: 25%">
                    <div class="modal-content">
                      <div class="modal-body">
                        <i class="fas fa-exclamation-triangle fa-3x"></i>
                        <p id="invalid_alert_msg" align="center"></p>

                        <br />
                      </div>
                    </div>
                  </div>
                </div>

              @endsection
