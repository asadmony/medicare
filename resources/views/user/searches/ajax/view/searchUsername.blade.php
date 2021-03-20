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
                        <a class="nav-link active" href="#username-search" data-toggle="tab">Username Search</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

    	@include('alerts.alerts') 
    	   	
        <div class="tab-content ">
            <div class="tab-pane active" id="username-search">

            	@include('user.searches.includes.searchedUsers')
                
            </div>
        </div>
    </div>
  </div>