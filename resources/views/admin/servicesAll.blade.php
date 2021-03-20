@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')
  <section class="content">

  	<br>

  	 <div class="row">
      
      <div class="col-sm-12">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              All Products/Services ({{ count($items) }}) of {{ $company->title }}
            </h3>
          </div>
          <div class="card-body">


             <div class="table-responsive">
          

          <table class="table table-hover">

            <thead>
              <tr>
                <th>SL</th>
                <th>Device Name</th>
                <th>Plate Number</th>
                <th>Device Number/MacID/IMEI</th>
                <th>Object Id</th>
                <th>Update </th>
                <th>Server </th>
                <th>GPS </th>
                {{-- <th>Sim Card No.</th> --}}
                {{-- <th>Model</th> --}}
                <th width="200">Action</th>
              </tr>
            </thead>

            <tbody> 

              <?php $i = 1; ?>

            @foreach($items as $key => $product)

          


            <tr>
              <td>{{ $i }}</td>
              <td>{{ $product['fullName'] }}</td>
              <td>{{ $product['platenumber'] }}</td>
              <td>{{ $product['macid'] }}</td>
              <td>{{ $product['objectid'] }}</td>
              <td>{{  date("d/m/Y h:i:s",$product['updtime']/1000) }}</td>
              <td>{{  date("d/m/Y h:i:s",$product['server_time']/1000) }}</td>
              <td>{{  date("d/m/Y h:i:s",$product['gpstime']/1000) }}</td>


              {{-- <td>{{ $product['iccid'] }}</td> --}}
              {{-- <td>{{ $product['model'] }}</td> --}}
              <td> 


<div class="btn-group btn-group-xs mb-1">
  <button type="button" data-url="{{ route('admin.productStatus',['company'=>$company, 'macid'=>$product['macid'],'platenumber'=>$product['platenumber']]) }}" class="btn btn-primary btn-xs states-modal-lg">States</button>

  <button type="button" data-url="{{ route('admin.productVersion',['company'=>$company, 'macid'=>$product['macid'], 'platenumber'=>$product['platenumber']]) }}" class="btn btn-primary btn-xs states-modal-lg">Version</button>

  <button type="button" data-url="{{ route('admin.productSettings',['company'=>$company, 'macid'=>$product['macid'], 'platenumber'=>$product['platenumber']]) }}" class="btn btn-primary btn-xs states-modal-lg">Settings</button>
  <a class="btn btn-primary btn-xs" href="{{ route('admin.companyDatas', $company) }}">All Data</a>

</div>

<div class="btn-group btn-group-xs">
  

<a onclick='window.open("{{ url('http://fdweb.18gps.net/user/playback.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$company->school_id.'&mapType=GOOGLE&custid='.$company->school_id.'&loginUrl=&mds='.$company->mds.'&objectid='.$product['objectid'].'&custname='.$product['platenumber']) }}", "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=180,left=10,width=1300,height=500")' class="btn btn-primary btn-xs" href="#">Playback</a> 

<a onclick='window.open("{{ url('http://fdweb.18gps.net/user/tracking.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$company->school_id.'&mapType=GOOGLE&custid='.$company->school_id.'&loginUrl=&mds='.$company->mds.'&objectid='.$product['objectid'].'&custname='.$product['platenumber']) }}", "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=180,left=10,width=1300,height=500")' class="btn btn-primary btn-xs" href="#">Track & Control</a>


  

</div>

                

                {{-- <a class="btn btn-primary btn-sm" href="{{ url('http://fdweb.18gps.net/user/tracking.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$company->school_id.'&mapType=GOOGLE&custid='.$company->school_id.'&loginUrl=&mds='.$company->mds.'&objectid='.$product->objectid.'&custname='.$product->platenumber) }}">Monitor</a> --}}

              </td>
              {{-- <td> <a target="_blank" href="{{ route('company.productMonitor',['company'=> $company, 'product'=>$product]) }}">Monitor</a></td> --}}


              

            </tr>

            <?php $i++; ?>

            @endforeach 
            </tbody>

          </table>

        </div>
            
          </div>
        </div>
        
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

