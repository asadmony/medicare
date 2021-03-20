 
<style>
  

.progress {
    height: 1em;
    
    /*background-color: #f5f5f5;*/
    /*border-radius: 4px;*/
    /*box-shadow: inset 0 1px 2px rgba(0,0,0,.1);*/
}

</style>


 <!-- Profile Image -->
          <div class="box box-widget">
            <div class="box-body">

              
                           

              
               @if($me->profilePoint() < 100)
              
              <div class="progress-group">
                    <span class="progress-text">Profile Info Currently Completed  <a data-toggle="tooltip" title="Profile Information {{ $me->profilePoint() }}% Completed" href="">  
                      {{-- ({{ $me->profilePoint() }}%)   --}}
                    </a></span>
                    <span class="progress-number"><b><a data-toggle="tooltip" title="Profile Information {{ $me->profilePoint() }}% Completed" href="">  {{ $me->profilePoint() }}   </a></b>/100</span>

                                          

                    <div class="progress {{ $me->profilePoint() < 100 ? 'active' : '' }} ">

                      <div class="progress-bar
                      @if ($me->profilePoint() < 37)
                         bg-danger
                         progress-bar-striped 
                      progress-bar-animated
                      @elseif($me->profilePoint() < 81)
                        w3-orange w3-text-white
                        progress-bar-striped 
                      progress-bar-animated
                      @else
                      bg-success
                      @endif

                      " 

                      role="progressbar" 



                      aria-valuenow="{{ $me->profilePoint() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $me->profilePoint() }}%">
                  <span class="sr-only">{{ $me->profilePoint() }}% Complete</span>  
                  {{ $me->profilePoint() }}%
                </div>
                    </div>
                  
                  </div>
                  <!-- /.progress-group -->

                  @endif


              {{-- <p class="text-muted text-center">Software Engineer</p> --}}

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->