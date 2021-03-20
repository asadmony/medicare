<div class="card card-nav-tabs">
  <h4 class="card-header 
  @auth
  {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}
  @else
  card-header-primary
  @endauth
  "><a class="w3-text-white" href="{{route('welcome.search')}}"><i class="fa fa-search "></i> &nbsp; Search </a></h4>
  <div class="card-body">


                <table class="table table-bordered table-condensed">
                    <tr>
                        <td>
                          @auth
                          <a class=" btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} btn-user-setting" href="{{route('welcome.searchZone', 'searchAll')}}">Search All</a>
                          @else
                          <a class=" btn btn-sm btn-block btn-primary btn-user-setting" href="{{route('welcome.searchZone', 'searchAll')}}">Search All</a>
                          @endauth
                          
                        </td>
                    </tr>

                    

                    <tr>
                        <td>
                          {{-- @auth
                          <a class=" btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} btn-user-setting" href="{{route('welcome.searchZone', 'searchProfession')}}">Profession Search</a>
                          @else
                          <a class=" btn btn-sm btn-block btn-primary btn-user-setting" href="{{route('welcome.searchZone', 'searchProfession')}}">Profession Search</a>
                          @endauth --}}
                          
                        </td>
                    </tr>

                    <tr>
                        <td>
                          @auth
                           <a class=" btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} btn-user-setting" href="{{route('welcome.searchZone', 'searchPhoto')}}">Photo Search</a>
                          @else
                           <a class=" btn btn-sm btn-block btn-primary btn-user-setting" href="{{route('welcome.searchZone', 'searchPhoto')}}">Photo Search</a>
                          @endauth
                         
                        </td>
                    </tr>

                    {{-- <tr>
                        <td><a class=" btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} btn-user-setting" href="{{route('welcome.searchZone', 'searchUsername')}}">Username Search</a></td>
                    </tr> --}}
                    
                    @auth

                    <tr>
                      <td>
                        <a class=" btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} btn-user-setting" href="{{route('welcome.searchZone', 'searchCustom')}}">Custom Search (by Setting)</a>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        @auth
                          @else
                          @endauth
                        <a class=" btn btn-sm btn-block {{$u->isMale() ? 'btn-info' : 'btn-rose'}} btn-user-setting" href="{{route('welcome.searchZone', 'searchSetting')}}">Search Setting</a>
                      </td>
                    </tr>

                    
                    @endauth
                        

                     
                </table>
 
            </div>
        </div>