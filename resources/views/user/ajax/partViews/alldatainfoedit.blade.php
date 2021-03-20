<div class="box box-widget mb-0 w3-animate-zoom" style="min-height: 600px;">


    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user"></i> All Info Edit</h3>
        
    </div>
    <div class="box-body" style=" min-height: 200px;">

        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-th"></i> Change Basic Information</h3>
        </div>
    
        <div class="box-body ">
    
            @include('alerts.alerts')
                   
            <div class="tab-content ">
                <div class="tab-pane active" id="change-mobile">
    
                    @include('user.settings.includes.forms.changeBasicInfoForm')
                    
                </div>
            </div>
        </div>

        {{-- contact info --}}
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-phone"></i> Change Contact Information</h3>
        </div>
    
        <div class="box-body ">
    
            @include('alerts.alerts') 
                   
            <div class="tab-content ">
                <div class="tab-pane active" id="change-mobile"> 
    
                    @include('user.settings.includes.forms.changeContactInfoForm')
                    
                </div>
            </div>
        </div>

        {{-- email --}}
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> Change Email Address</h3>
        </div>
    
        <div class="box-body ">
    
            @include('alerts.alerts') 
                   
            <div class="tab-content ">
                <div class="tab-pane active" id="change-username">
    
                    @include('user.settings.includes.forms.changeEmailForm')
                    
                </div>
            </div>
        </div>

        {{-- mobile --}}
        {{-- <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-phone"></i> Change Mobile Number</h3>
        </div> --}}
    
        <div class="box-body ">
    
            @include('alerts.alerts') 
                   
            <div class="tab-content ">
                <div class="tab-pane active" id="change-mobile">
    
                    @include('user.settings.includes.forms.changeMobileForm')
                    
                </div>
            </div>
        </div>
        {{-- password --}}
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-lock"></i> Change Password</h3>
        </div>
    
        <div class="box-body ">
    
            @include('alerts.alerts') 
                   
            <div class="tab-content ">
                <div class="tab-pane active" id="change-mobile">
    
                    @include('user.settings.includes.forms.changePasswordForm')
                    
                </div>
            </div>
        </div>
        {{-- personal activities --}}
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> Change Personal Activities</h3>
        </div>
    
        <div class="box-body ">
    
            @include('alerts.alerts') 
                   
            <div class="tab-content ">
                <div class="tab-pane active" id="change-mobile">
    
                    @include('user.settings.includes.forms.changePersonalActivityForm')
                    
                </div>
            </div>
        </div>
        {{-- personal info --}}

        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-th"></i> Change Personal Info</h3>
        </div>
    
        <div class="box-body " style="background: #eee;">
    
            @include('alerts.alerts') 
                   
            <div class="tab-content ">
                <div class="tab-pane active" id="change-mobile">
    
                    @include('user.settings.includes.forms.changePersonalInfoForm')
                    
                </div>
            </div>
        </div>

        {{-- education info --}}
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-th"></i> Change Education Info</h3>
        </div>
    
        <div class="box-body " style="background: #eee;">
    
            @include('alerts.alerts') 
                   
            <div class="tab-content ">
                <div class="tab-pane active" id="change-mobile">
    
                    @include('user.settings.includes.forms.changeEduInfoForm')
                    
                </div>
            </div>
        </div>
        {{-- user name --}}

        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> Change Username</h3>
        </div>
    
        <div class="box-body ">
    
            @include('alerts.alerts') 
                   
            <div class="tab-content ">
                <div class="tab-pane active" id="change-username">
    
                    @include('user.settings.includes.forms.changeUsernameForm')
                    
                </div>
            </div>
        </div>
    </div>         
  </div>