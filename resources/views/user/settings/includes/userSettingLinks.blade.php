<div class="card card-nav-tabs">
  <h4 class="card-header {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}"><a class="w3-text-white" href="{{route('user.settings')}}"><i class="fa fa-cog fa-spin"></i> &nbsp; Settings</a></h4>
  <div class="card-body">


                <table class="table table-bordered table-condensed">
                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}  btn-user-setting" href="{{route('user.settingZone', 'edit_my_profile')}}">Edit My Profile</a></td>
                    </tr>

                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}  btn-user-setting" href="{{route('user.settingZone', 'edit_personal_info_for_office')}}">Edit Personal Information</a></td>
                    </tr>
                    
                    {{-- <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}  btn-user-setting" href="{{route('user.settingZone', 'change_username')}}">Change Username</a></td>
                    </tr> --}}

                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}  btn-user-setting" href="{{route('user.settingZone', 'change_password')}}">Change Password</a></td>
                    </tr>

                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}  btn-user-setting" href="{{route('user.settingZone', 'change_email')}}">Change Email</a></td>
                    </tr>

                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}}  btn-user-setting" href="{{route('user.settingZone', 'change_contact')}}">Update Contact Number</a></td>
                    </tr>

                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} " href="{{route('user.myProfile')}}">Update Photos</a></td>
                    </tr>

                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} " href="{{route('user.myAllPhotos','public')}}">My Public Photos</a></td>
                    </tr>

                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} " href="{{route('user.myAllPhotos', 'private')}}">My Private Photos</a></td>
                    </tr>

                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} " href="{{route('user.payNow')}}">New Payment</a></td>
                    </tr>

                    <tr>
                        <td><a class="btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} " href="{{route('user.myPaymentHistory')}}">My Payment History</a></td>
                    </tr>



                </table>
 
            </div>
        </div>