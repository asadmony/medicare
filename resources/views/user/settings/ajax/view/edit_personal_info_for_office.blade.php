<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-personal-info-for-office" data-toggle="tab">My Personal Information (For Office Use Only)</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#tab-personal-info" data-toggle="tab">Personal Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-education-work" data-toggle="tab">Education & Work</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#tab-religion" data-toggle="tab">Religion</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

    	@include('alerts.alerts') 
    	   	
        <div class="tab-content ">
            <div class="tab-pane active" id="tab-personal-info-for-office">

            	@include('user.settings.includes.forms.personalInfoForOfficeForm')
                
            </div>
            {{-- <div class="tab-pane" id="tab-personal-info">

                @include('user.settings.includes.forms.personalInfoForm')
                
            </div>
            <div class="tab-pane" id="tab-education-work">
                @include('user.settings.includes.forms.educationWorkForm')
            </div>

            <div class="tab-pane" id="tab-religion">
                @include('user.settings.includes.forms.religionForm')
            </div> --}}
        </div>
    </div>
  </div>