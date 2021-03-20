@extends('company.layouts.companyMaster')

@push('css')

<style>
   tr.nowrap td {
        white-space:nowrap;
    }
</style>
@endpush

@section('content')
  <section class="content">

    <br>

     <div class="row">      
      <div class="col-sm-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Filtered Alarm Data 
            </h3>
          </div>
        </div>        
      </div>     
      <div class="col-sm-12">
        
    <form action="{{route('company.alarmSearch', $company)}}">

            <div class="card">
            <div class="card-body">
                
            
                    <div class="row">
                        <div class="col-md-2">
                        <label for="">From Date:</label>
                        <input type="date" name="from" value="{{$from}}" id="" class="form-control datetimepicker-input" placeholder="From">
                        </div>
                        
                        <div class="col-md-2">
                        <label for="">To Date:</label>
                        <input type="date" name="to" value="{{$to}}" id="" class="form-control datetimepicker-input" placeholder="To">
                        </div>
                        <div class="col-md-2 col-sm-3 ">
                        <div class="form-group">
                            <label>Select MacId / SiteId</label>
                            <div class="select2-purple">
                            <select class="select2-another" multiple="multiple" name="macids[]" id="search" data-placeholder="Select Device" style="width: 100%;">
                                
                                @foreach($company->products as $product)                            
                                <option {{in_array($product->macid,$macids) ? 'selected' : ''}}>{{$product->macid}}</option>
                                @endforeach
                    
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-2 col-sm-2 ">
                          <div class="form-group">
                            <label>Per Page</label>
                          <input type="text" name="pages" value="{{$pages}}" class="form-control datetimepicker-input" placeholder="Data Per Page">
                          </div>
                        </div>
                        
                        <div class="col-md-2 mt-4">
                        <div class="form-group mt-1">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                        </div>

                        <div class="col-sm-2 mt-4">
                          <div class="form-group mt-1">
                            <button class="btn btn-sm btn-primary float-right" onclick="exportTableToCSV('alarmfilterData.csv')">Export To CSV</button>

                          </div>
                        </div>
                    </div>
                
                </div>
                <!-- /.card-body -->
            </div>
    </form>
</div>

    <!-- /.form -->
      <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
              
        
        
                <div class="table-responsive">
             
                  <div id="printArea">
                    <div class="box-widget">
                      <table class="table table-hover table-sm table-bordered table-striped">
        
                        <thead>
                            <tr >
                                
                                <th colspan="" rowspan="" headers="" scope="">SL</th>
                                {{-- <th>Action</th> --}}

                                <th colspan="" rowspan="" headers="" scope="">MacId</th>                                
                                <th colspan="" rowspan="" headers="" scope="">Device Name</th>
                                
                                <th colspan="" rowspan="" headers="" scope="">GPS Time</th>
                                <th colspan="" rowspan="" headers="" scope="">Send Time</th>
                                <th colspan="" rowspan="" headers="" scope="">Lat</th>
                                <th colspan="" rowspan="" headers="" scope="">Lng</th>
                                <th colspan="" rowspan="" headers="" scope="">Alarm Details</th>
        
                                
                            
                            </tr>
                        </thead>
                        <tbody class="w3-small"> 
                            <?php $i = (($items->currentPage() - 1) * $items->perPage() + 1); ?>
                        
                                @foreach ($items as $item)
        
                                    <tr class="nowrap">
                            
                                        <td>{{$i}}</td>
                                        {{-- <td>
                                            <a target="_blank" class="btn btn-xs btn-primary w3-tiny  py-0" href="{{ route('company.singleDeviceSingleDataDetails', ['company'=>$company, 'data'=>$item]) }}">Details</a>
                                        </td> --}}
                                        <td>{{$item->macid}}</td>
                                        <td>{{$item->user_name}}</td> 
                                        <td> {!! date("Y-m-d h:i:s",$item->gps_time/1000) !!}</td>
                                        <td>{!! date("Y-m-d h:i:s",$item->send_time/1000) !!}</td>
                                        <td>{{$item->lat}}</td>
                                        <td>{{$item->lng}}</td>
                                        <td>
                                          @if ($item->type_id ==2)
                          Outgoing Fence Alarm
                      @elseif ($item->type_id ==4)
                          Enter Fence Alarm
                      @elseif ($item->type_id ==5)
                          Power Failure Alarm
                      @elseif ($item->type_id ==8)
                        Low Battry Alarm
                      @elseif ($item->type_id ==9)
                        Vibration Alarm
                      @elseif ($item->type_id ==10)
                        Motion Alarm
                      @elseif ($item->type_id ==32)
                        The Bluetooth Module
                      @elseif ($item->type_id ==37)
                        Offline Alarm
                      @elseif ($item->type_id ==55)
                        Power On
                      @elseif ($item->type_id ==67)

                        Loss Connection Alarm

                      @else
                        
                          
                      @endif
                                        </td>
                                        
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
{{$items->appends(['pages'=>$pages, 'macids' => $macids, 'filter'=>$filter,'from'=>$from,'to'=>$to])->render()}}

</div>
  
 
  
  </section>
@endsection


@push('js')
<!-- Select2 -->
<script src="{{asset('cp/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- moment -->
<script src="{{asset('cp/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('cp/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

<!-- date-range-picker -->
<script src="{{asset('cp/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     // document.body.innerHTML = originalContents;
   };

  $( document ).ready(function() {
    $('#all-checked').click(function(event) {
      if(this.checked) {
          // Iterate each checkbox
          $(':checkbox').each(function() {
              this.checked = true;
          });
      }
      else {
        $(':checkbox').each(function() {
              this.checked = false;
          });
      }
    });
  });
    
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()  
    })

   

    $(function () {
      //Initialize Select2 Elements
      $('.select2-another').select2();  
    })

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()

    // $('#datepicker').datepicker({
    //         uiLibrary: 'bootstrap4'
    //     });

    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  //   if($('#all-checked').is(':checked')) {
  //     $('#checkboxPrimary3').prop('checked', true);
  //  }
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
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));     
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
  </script>

@endpush

