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
            <td width='25%'><b>Home Upazilla/Thana</b></td>
            <td width='25%'>
              {!! \App\Common::upzila($user->location_upzila) !!}
            </td>
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



  {{-- extra
    back up --}}


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






    {{-- some code from my dashboard --}}

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