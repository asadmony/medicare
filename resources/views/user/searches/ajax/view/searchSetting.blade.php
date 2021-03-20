<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header 
    @auth
    {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}
    @else
    card-header-primary
    @endauth
    ">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#search-setting" data-toggle="tab">Basic Settings</a>
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
            <div class="tab-pane active" id="search-setting">

                @include('user.searches.includes.forms.searchSettingForm')
                
            </div>

            <div class="tab-pane" id="tab-personal-info">

                @include('user.searches.includes.forms.personalInfoForm')
                
            </div>
            <div class="tab-pane" id="tab-education-work">
                @include('user.searches.includes.forms.educationWorkForm')
            </div>

            <div class="tab-pane" id="tab-religion">
                @include('user.searches.includes.forms.religionForm')
            </div>
        </div>
    </div>
  </div>