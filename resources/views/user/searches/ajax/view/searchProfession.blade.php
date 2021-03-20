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
                        <a class="nav-link active" href="#profession-search" data-toggle="tab">Profession Search</a>
                    </li>

                    &nbsp; &nbsp; &nbsp;

                    <li class="nav-item">
                        <form class="form-inline ml-auto" style="margin-top: -20px;">
                                    <div class="form-group has-white bmd-form-group">

                                        <div class="input-group-append" style="margin-left: 20px;margin-right: -30px;">
                                          <span class="input-group-text text-white">
                                          <i class="material-icons">search </i></span>
                                        </div>
                                        <input style="padding-left:30px;" type="text" class="form-control input-profession" placeholder="Search by Profession" autofocus data-url="{{ route('welcome.userSearchByProfessionAjax') }}">
                                        
                                    </div>
                                    {{-- <button type="submit" class="btn btn-white w3-tiny btn-raised btn-fab btn-round">
                                        <i class="material-icons">search</i>
                                    </button> --}}
                                </form>
                    </li>
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

    	@include('alerts.alerts') 
    	   	
        <div class="tab-content ">
            <div class="tab-pane active profession-search-container" id="profession-search">

            	@include('user.searches.includes.searchedUsers')
                
            </div>
        </div>
    </div>
  </div>