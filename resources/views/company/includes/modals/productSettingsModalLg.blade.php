


<!-- Modal content-->
<div class="modal-content w3-round">       
  <div class="modal-body-s">







    <div class="card card-widget">
      <div class="card-header with-border">
        <h3 class="card-title"><i class="fa fa-battery-full text-primary"></i> Device Settings</h3>
        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
      </div>
      <div class="card-body w3-light-gray pb-0">


        <div class="row">
          <div class="col-sm-12 col-md-10  offset-md-1">

            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-cogs text-primary"></i> <span class="badge badge-light">
                  
              Device (MacId: {{ $macid }}, Name: {{ $platenumber }}) Settings

                </span> 
            </h3>
              </div>
              <div class="card-body" style="min-height: 200px;">


                <div class="table-responsive">
                  

                <table class="table table-sm table-striped">
                  <tbody>
                    

                    @foreach($setting as $key => $value)

                    <tr>
                      @if($key == 'BMS_DateTime')
                      <th>{{ $key }}</th><td>{!! date("Y-m-d h:i:s",$value/1000) !!}</td>
                      @else
                      <th>{{ $key }}</th><td>{!! $value !!}</td>
                      @endif
                    </tr>

                    @endforeach
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

          <div class="overlay modal-feed"><i class="fas fa-2x fa-sync-alt fa-spin w3-xxxlarge w3-text-blue"></i>
          </div>


       
    </div>

</div>
</div>
