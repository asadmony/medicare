<div class="box box-widget mb-0" style="min-height: 600px;">

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
  </div>