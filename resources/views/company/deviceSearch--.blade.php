@extends('company.layouts.companyMaster')

@push('css')
@endpush

@section('content')
  <section class="content">

    <br>

    <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Product/Device Search</h3>

              <div class="card-tools">
                <form action="{{ route('company.deviceSearch',$company) }}">
                  
                <div class="input-group input-group-sm">
                  <input type="text" name="q" value="{{ isset($q) ? $q : '' }}" class="form-control" placeholder="Search Device ID/EMEI/Name">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-warning">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
                </form>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="min-height: 500px;">

                <div class="table-responsive" style="min-height: 60vh;">
                <table class="table table-hover table-striped table-sm">
                  <thead>
              <tr>
                <th>SL</th>
                <th>Device Name</th>
                <th>Plate Number</th>
                <th>Device</th>
                {{-- <th>Object Id</th> --}}
                <th>Update </th>
                {{-- <th>Server </th> --}}
                {{-- <th>GPS </th> --}}
                {{-- <th>Sim Card No.</th> --}}
                {{-- <th>Model</th> --}}
                <th width="200">Action</th>
              </tr>
            </thead>
                  <tbody> 

              <?php $i = (($items->currentPage() - 1) * $items->perPage() + 1); ?>
            @if($items->first())
            @foreach($items as $key => $product)

          


            <tr>
              <td>{{ $i }}</td>
              <td>{{ $product['title'] }}</td>
              <td>{{ $product['platenumber'] }}</td>
              <td>{{ $product['macid'] }}</td>
              {{-- <td>{{ $product['objectid'] }}</td> --}}
              <td>{{  date("d/m/Y h:i:s",$product['update_time']/1000) }}</td>
 
              <td> 


                <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown">
    Option
  </button>
  <div class="dropdown-menu">

    <button type="button" data-url="{{ route('company.productStatus',['company'=>$company, 'macid'=>$product['macid'],'platenumber'=>$product['platenumber']]) }}" class="dropdown-item btn btn-primary btn-xs states-modal-lg">States</button>

    <button type="button" data-url="{{ route('company.productVersion',['company'=>$company, 'macid'=>$product['macid'], 'platenumber'=>$product['platenumber']]) }}" class="dropdown-item btn btn-primary btn-xs states-modal-lg">Version</button>

    <button type="button" data-url="{{ route('company.productSettings',['company'=>$company, 'macid'=>$product['macid'], 'platenumber'=>$product['platenumber']]) }}" class="dropdown-item btn btn-primary btn-xs states-modal-lg">Settings</button>

    <a onclick='window.open("{{ url('http://fdweb.18gps.net/user/playback.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$company->school_id.'&mapType=GOOGLE&custid='.$company->school_id.'&loginUrl=&mds='.$company->mds.'&objectid='.$product['objectid'].'&custname='.$product['platenumber']) }}", "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=180,left=10,width=1300,height=500")' class="dropdown-item btn btn-primary btn-xs" href="#">Playback</a> 

    <a onclick='window.open("{{ url('http://fdweb.18gps.net/user/tracking.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$company->school_id.'&mapType=GOOGLE&custid='.$company->school_id.'&loginUrl=&mds='.$company->mds.'&objectid='.$product['objectid'].'&custname='.$product['platenumber']) }}", "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=180,left=10,width=1300,height=500")' class="dropdown-item btn btn-primary btn-xs" href="#">Track & Control(Monitor)</a>


    <a  class="dropdown-item btn btn-primary btn-xs" href="{{ route('company.productEdit',['company'=>$company, 'device'=>$product]) }}">Edit</a>

    <a  class="dropdown-item btn btn-primary btn-xs" href="{{ route('company.singleDeviceAllData',['company'=>$company, 'product'=>$product]) }}">All Data</a>



  </div>
</div>

 

              </td>
   
              

            </tr>

            <?php $i++; ?>

            @endforeach 
            @endif

            
            </tbody>

              </table>
            
            </div>
               
            
            </div>
            <!-- /.card-body -->
              </div>
          <!-- /.card -->
        </div>
      </div>


          <!-- The Modal -->
  <div class="modal fade" id="myModalLg">
    <div class="modal-dialog modal-lg w3-animate-zoom w3-round">
 
        <div id="modalLargeFeed">
        <div class="card card-widget">  
          <div class="card-body">
            
          

            <div  style="min-height: 300px;" class=""></div>
      
         

      </div>


       <div class="overlay modal-feed"><i class="fas fa-2x fa-sync-alt fa-spin w3-xxxlarge w3-text-blue"></i>
            </div>
          </div>

 
        
      </div>

    </div>
  </div>
 
  
  </section>
@endsection


@push('js')



<script>
  $(document).ready(function(){
  $(document).on('click','.states-modal-lg', function(e){

      e.preventDefault();
      var that =  $( this ),
          url = that.attr( "data-url" );
          $("#myModalLg").modal({backdrop: false});

      // alert(url);
    $.ajax({
      url: url,
      type: "Get",
      cache: false,
      dataType: 'json',
      beforeSend: function()
      {
          // $(".loadingModalData").show();
          $(".modal-feed").show();
      },
      complete: function()
      {
          // $(".loadingModalData").hide();
          $(".modal-feed").hide();
      },
    }).done(function(data){

      $('#modalLargeFeed').empty().append(data.view);      
 
    }).fail(function(){});
  });
  });
</script>


@endpush

