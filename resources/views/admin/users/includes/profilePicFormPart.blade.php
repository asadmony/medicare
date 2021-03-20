<div class="row">
    <div class="col-sm-3">
        

<div class="box box-widget">
<div class="box-header with-border">
<h3 class="box-title">Upload Profile Picture </h3>
<div class="box-tools pull-right">
    @if ($user->uploadedPP())
    <a href="{{ route('admin.userPPDelete', $user->uploadedPP()) }}" title="Delete this picture">
        <span class="fa-stack fa-lg ">
          <i class="fa fa-square-o fa-stack-2x "></i>
          <i class="fa fa-trash w3-text-white w3-hover-shadow w3-hover-deep-orange w3-round w3-card-4 w3-red fa-stack-1x "></i>
        </span>
    </a>
    @endif
</div>
</div>
<div class="box-body w3-padding-large" style="min-height: 260px;">
<div class="row">



        <div class="row">
            <div class="col-sm-12">
        @include('admin.users.includes.profilePictureForUpdate')
            </div>
        </div>

 <div class="row">
     <div class="col-sm-12">

        @if ($user->uploadedPP())


        
        <div class="checkbox">
        <label>
            <input class="image-check"
            data-url="{{ route('admin.userProfilepicCheck', [$user->uploadedPP(),'checked']) }}" 
            type="checkbox"
            name="profile_pic_checked"
            
                
            {{$user->uploadedPP()->checked ? 'checked' : ''}} 

 

            /> Data Checked (Profile Pic)</label>
        </div>
        
        <div class="checkbox">
        <label>
            <input class="image-check"
            data-url="{{ route('admin.userProfilepicCheck', [$user->uploadedPP(),'edit']) }}" 
            type="checkbox"
            name="profile_pic_can_edit"
 
                
            {{$user->uploadedPP()->can_edit ? 'checked' : ''}} 

 
            /> Can Edit (Profile Pic)</label>
        </div> 




        @endif
         
     </div>
 </div>

        


</div>
</div>
</div>



    </div>

    <div class="col-sm-9">
        
        <div class="row">
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-6">
                        
                        
                        


                        <div class="box box-widget">
            <div class="box-header with-border">
                <h3 class="box-title">Send Temporary Pass</h3>
            </div>

            <div class="box-body" style="min-height: 260px;">

                <form method="post" action="{{ route('admin.newTempPassSendPost', $user) }}">
                    {{ csrf_field() }}
                      <div class="form-group form-group-lg  {{ $errors->has('new_password') ? ' has-error' : '' }}">
                          
                          @if(Auth::user()->email == 'masudbdm@gmail.com')
                        
                        
                        <label for="new_password">New Password:</label>
                        
                        
                        <input autocomplete="off" type="text" placeholder="New Password for {{ $user->username}}" name="new_password" value="{{ old('new_password') ?: $user->password_temp }}" class="form-control" id="new_password">

                        <span class="help-block">Previous Temp Pass: <b class="w3-text-purple">{{ $user->password_temp }} </b></span>
                        
                        @else
                        <br> 
                        
                        <p>Click the button below, New password will be create and send to the user automatically.</p>
                            
                        <br>
                        @endif
                        
                        @if($errors->has('new_password'))

                        <span class="help-block">
                            <strong>{{ $errors->first('new_password') }}</strong>
                        </span>

                        @endif
                      </div>
                      
                      

                      <button type="submit" class="w3-btn w3-round w3-blue">Click & Send New Password</button>
                    </form>
                
            </div>
        </div>
        
        
        
        
                        
                    </div>
                    <div class="col-sm-6">

                        <div class="box box-widget">
            <div class="box-header with-border">
                <h3 class="box-title">Upgrade to Free Package</h3>
            </div>

            <div class="box-body" style="min-height: 260px;">

                <form method="post" action="{{ route('admin.upgradeUserForFreePost', $user) }}">
                    {{ csrf_field() }}
                      <div class="form-group form-group-lg  {{ $errors->has('free_membership_duration') ? ' has-error' : '' }}">
                        <label for="free_membership_duration">Duration (Days):</label>
                        <input autocomplete="off" type="number" placeholder="Free Membership Duration" name="free_membership_duration" min="1" max="20" value="{{ old('free_membership_duration') ?: 2 }}" class="form-control" id="free_membership_duration">
                        <span class="help-block">Minimum 1 & maximum 20 days</span>


                        @if($errors->has('free_membership_duration'))

                        <span class="help-block">
                            <strong>{{ $errors->first('free_membership_duration') }}</strong>
                        </span>

                        @endif
                      </div>

                      <button type="submit" class="w3-btn w3-round w3-blue">Upgrade for Free</button>
                    </form>
                
            </div>
        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-5">


                <div class="box box-widget">
            <div class="box-header with-border">
                <h3 class="box-title">User Analytics</h3>
            </div>

            <div class="box-body" style="min-height: 260px;">

    <dl class="dl-horizontal" style="margin-bottom: 0px;">
     <dt>Visitors</dt>
     <dd>{{ $user->visitors()->count() }}</dd>
     <dt>Favourite Users</dt>
     <dd>{{ $user->favs()->count() }}</dd>
     <dt>Blocked Users</dt>
     <dd>{{ $user->blockss()->count() }}</dd>
     <dt>Proposal Pending to me</dt>
     <dd>{{ $user->pendingProposalToMeCount() }}</dd>
     <dt>Proposal to me</dt>
     <dd>{{ $user->proposalToMeCount() }}</dd>
     <dt>Proposal sent by me</dt>
     <dd>{{ $user->proposalFromMeCount() }}</dd>

     <dt>My Contacts ({{ $user->contactLimit() }})</dt>
     <dd>{{ $user->cont()->count() }}</dd>

     <dt>Current Package</dt>
     <dd>{{ $user->package }}</dd>
     <dt>Expired at</dt>
     @if($user->expired_at)
     <dd>{{ date('d-M-Y', strtotime($user->expired_at)) }}</dd>
     @else
     <dd>0</dd>
     @endif
     <dt>Duration (Days)</dt>
     <dd>{{ $user->packageDuration() }}</dd>

      @if ($user->loggedin_at)
        <dt>Last Login </dt>
        <dd>

            {{ $user->loggedin_at }}</dd>
      @endif
     
</dl>
                 
                
            </div>
        </div>
                
            </div>
        </div>
    </div>
 
</div>

