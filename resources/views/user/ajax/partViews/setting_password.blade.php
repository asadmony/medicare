<div class="box box-widget mb-0" style="min-height: 600px;">

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
  </div>