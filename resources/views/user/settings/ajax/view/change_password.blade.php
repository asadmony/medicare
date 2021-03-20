<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#change-password" data-toggle="tab">Change Password</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

    	@include('alerts.alerts') 
    	   	
        <div class="tab-content ">
            <div class="tab-pane active" id="change-password">

            	@include('user.settings.includes.forms.changePasswordForm')
                
            </div>
        </div>
    </div>
  </div>