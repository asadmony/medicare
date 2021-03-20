<div class="card card-nav-tabs">
  <h4 class="card-header {{$u->isMale() ? 'card-header-info' : 'card-header-rose'}}"><a class="w3-text-white" href="javascript::void(0)"> About {{$u->username}}</a></h4>
  <div class="card-body">


                <table class="table table-bordered table-condensed">
                    {{-- <tr>
                        <td><b>Name</b></td><td>{{$u->name}}</td>
                    </tr> --}}

                     <tr>
                        <td><b>Username</b></td><td>{{$u->username}}</td>
                    </tr> 
                    
                    <tr>
                        <td><b>Gender</b></td><td>{{$u->gender}}</td>
                    </tr>

                    <tr>
                        <td><b>Location</b></td><td>{{$u->location}}</td>
                    </tr>

                    <tr>
                        <td><b>Country</b></td><td>{{$u->country}}</td>
                    </tr>

                    <tr>
                        <td><b>Looking For</b> </td><td>{{$u->looking_for}}</td>
                    </tr>

                </table>
 
 
            </div>
        </div>