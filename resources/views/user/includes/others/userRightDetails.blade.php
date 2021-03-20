<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header {{$u->isMale() ? 'card-header-info' : 'card-header-rose'}}">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">

                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-photos" data-toggle="tab">Photos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="#tab-about-me" data-toggle="tab">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="#tab-personal-info" data-toggle="tab">Personal Info</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-education-work" data-toggle="tab">Education & Work</a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-religion" data-toggle="tab">Religion</a>
                    </li>
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

{{--     	@include('alerts.alerts')  --}}
    	   	
        <div class="tab-content ">

            <div class="tab-pane active" id="tab-photos">

                <div class="photos-container" style="min-height: 400px;">
                    @include('user.includes.data.photos')
                </div>

                <br>
                {{ $u->photoPublicSix()->links() }}
            
                

            </div>

            <div class="tab-pane " id="tab-about-me">
                
                @if($u->about)
                @include('user.includes.data.aboutMe')
                @endif
            </div>

            <div class="tab-pane " id="tab-personal-info">
                @if($u->personalInfo)
                @include('user.includes.data.personalInfo')
                @endif
            </div>

            <div class="tab-pane" id="tab-education-work">


                @if($u->educationWork)
                @include('user.includes.data.educationWork')
                @endif
            </div>

            
            

            <div class="tab-pane" id="tab-religion">


                @if($u->religion)
                @include('user.includes.data.religion')
                @endif

            </div>
        </div>
    </div>
  </div>