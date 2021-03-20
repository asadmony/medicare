<div class="box box-widget mb-0" style="min-height: 600px;">
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
  </div>