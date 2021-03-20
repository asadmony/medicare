<div class="box box-widget mb-0" style="min-height: 400px;">

    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-wrench  text-purple"></i> Search Setting (My Partner Preference Setting)</h3>
    </div>

    <div class="box-body" style="background: #eee;">

        @include('alerts.alerts') 
            
        <div class="tab-content ">
            <div class="tab-pane active" id="change-mobile">

                @include('user.searches.includes.forms.searchSettingForm')
                
            </div>
        </div>
    </div>
  </div>