
     <!-- Classic Modal -->
    <div class="modal fade" id="settingModal" 
    {{-- tabindex="-1"  --}}
    role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h3 class="modal-title"> Complete your registration process </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                    </button>
                </div> --}}
                <div class="modal-body">

                    @if (!Auth::user()->about)




<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab" data-toggle="tab">About Me</a>
                    </li>


                    <li class="nav-item">
                        &nbsp;
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>
                     
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

        @include('alerts.alerts')
            
        <div class="tab-content ">
            <div class="tab-pane active" id="tab">
                @include('user.settings.includes.forms.aboutMeForm')               
            </div>            
        </div>
    </div>
  </div>



                         

                    @elseif(! Auth::user()->personalInfo)


<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab" data-toggle="tab">Personal Information</a>
                    </li>

                    <li class="nav-item">
                        &nbsp;
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>
                     
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

        @include('alerts.alerts')
            
        <div class="tab-content ">
            <div class="tab-pane active" id="tab">
                @include('user.settings.includes.forms.personalInfoForm')               
            </div>            
        </div>
    </div>
  </div>                    

                          
                    @elseif(! Auth::user()->educationWork)

<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab" data-toggle="tab">Education & Work</a>
                    </li>

                    <li class="nav-item">
                        &nbsp;
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>
                     
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

        @include('alerts.alerts')
            
        <div class="tab-content ">
            <div class="tab-pane active" id="tab">
                @include('user.settings.includes.forms.educationWorkForm')               
            </div>            
        </div>
    </div>
  </div>  


                          

                    @elseif(! Auth::user()->religion)

<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab" data-toggle="tab">Religion</a>
                    </li>

                    <li class="nav-item">
                        &nbsp;
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle-o"></i></a>
                    </li>
                     
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

        @include('alerts.alerts')
            
        <div class="tab-content ">
            <div class="tab-pane active" id="tab">
                @include('user.settings.includes.forms.religionForm')               
            </div>            
        </div>
    </div>
  </div>  

                          

                    @elseif(! Auth::user()->infoForOffice)

<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-personal-info-for-office" data-toggle="tab">My Personal Information (For Office Use Only)</a>
                    </li>

                    <li class="nav-item">
                        &nbsp;
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-check-circle"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary btn-fab btn-round" href="javascript::void(0)" data-toggle="tab"><i class="fa fa-circle"></i></a>
                    </li>
                     
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

        @include('alerts.alerts')
            
        <div class="tab-content ">
            <div class="tab-pane active" id="tab-personal-info-for-office">
                @include('user.settings.includes.forms.personalInfoForOfficeForm')                
            </div>            
        </div>
    </div>
  </div>
                    
                    @endif
 
                     
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->