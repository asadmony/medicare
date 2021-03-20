@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')
  <section class="content">

    <br>
    @if (Session::has('message'))
      <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif
     <div class="row">

      <div class="col-sm-12">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              All @if(isset($type)) {{$type}} @endif Devices ({{ count($items) }})
            </h3>
            <?php $fn = isset($type) ? $type."AllData.csv" : "AllData.csv";?>
            {{-- <a href="" onclick="return printDiv('printArea');" class="btn btn-md btn-light pull-left" style="color: #000; margin-left: 40rem; margin-top: -4px;">Print</a> --}}
            <div class="card-tools">
              <button class="btn btn-sm btn-light float-right" onclick="exportTableToCSV('{{$fn}}')">Export To CSV</button>

            <form action="{{route('admin.deviceSearch')}}" class="float-right mr-3 mt-1">
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
          </div>
          <div class="card-body pt-0"  style="min-height: 500px;">


            <div class="table-responsive" style="min-height: 60vh;">


         <table class="table table-hover table-striped table-sm">

           <thead>
             <tr>
               <th>SL</th>
               <th>Company</th>
               <th>Device Name</th>
               <th>Plate Number</th>
               <th>Device</th>
               <th>Update </th>
               <th>Status</th>
               <th>Online/Offline</th>
               <th width="200">Action</th>
               
             </tr>
           </thead>

           <tbody>

              <?php $i = (($items->currentPage() - 1) * $items->perPage() + 1); ?>

           @foreach($items as $product)




           <tr>
             <td>{{ $i }}</td>
             <td>{{$product->company ? $product->company->title : ''}}</td>
             <td>{{ $product['title'] }}</td>
             <td>{{ $product['platenumber'] }}</td>
             <td>{{ $product['macid'] }}</td>
             <td>{{  date("d/m/Y h:i:s",$product['update_time']/1000) }}</td>
             <td>

              @if($product->force_inactive)
                <span class="badge badge-default w3-light-gray">Inactive</span>
                @else
                <span class="badge badge-primary">Active</span>
                @endif

              </td>
              <td>
                @if($product->location_offline)
                <span class="badge badge-default w3-light-gray">Offline</span>
                @else
                <span class="badge badge-primary">Online</span>
                @endif
              </td>
              <td>

                <div class="dropdown no-print">
                  <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown">
                    Option
                  </button>
                  <div class="dropdown-menu">
                    <?php $cmp =  $product->company ?>
                    
                    
                    <a onclick='window.open("{{ url('http://fdweb.18gps.net/user/playback.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$cmp->school_id.'&mapType=GOOGLE&custid='.$cmp->school_id.'&loginUrl=&mds='.$cmp->mds.'&objectid='.$product['objectid'].'&custname='.$product['platenumber']) }}", "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=180,left=10,width=1300,height=500")' class="dropdown-item btn btn-primary btn-xs" href="#">Playback</a>

                    <a onclick='window.open("{{ url('http://fdweb.18gps.net/user/tracking.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$cmp->school_id.'&mapType=GOOGLE&custid='.$cmp->school_id.'&loginUrl=&mds='.$cmp->mds.'&objectid='.$product['objectid'].'&custname='.$product['platenumber']) }}", "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=180,left=10,width=1300,height=500")' class="dropdown-item btn btn-primary btn-xs" href="#">Track & Control(Monitor)</a>


                    <a href="{{ route('admin.companyEdit', $product->company->id) }}"><button type="button" class="dropdown-item btn btn-primary btn-xs">Edit</button></a>
                    <a href="{{ route('admin.companyDatas', [$product->company->id, 'device'=> $product->id]) }}"><button type="button" class="dropdown-item btn btn-primary btn-xs">All Data</button></a>
                    <a href="{{route('admin.allAlarmData',[$product->company->id, 'device'=> $product->id])}}"><button type="button" class="dropdown-item btn btn-primary btn-xs">All Alarm Data</button></a>

                    <a  class="dropdown-item btn btn-primary btn-xs" href="{{ route('admin.singleDeviceMap',['company'=>$product->company->id, $product->macid]) }}"><button type="button" class="dropdown-item btn btn-primary btn-xs">Map</button></a>
                    
                    




                  </div>
                </div>



                

              </td>
             

           </tr>
           <?php $i++; ?>
           @endforeach


           </tbody>

         </table>

       </div>

       {{ $items->appends([

         'company' => isset($company_id) ? $company_id : null
       ])->render() }}

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
  function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}
function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
        row.push("\""+cols[j].innerText+"\"");
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>

@endpush