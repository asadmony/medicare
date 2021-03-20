@extends('subrole.layouts.subRoleMaster')

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
              All Alarm Data of {{$subrole->title}}
            </h3>
          </div>
          <div class="card-body p-1">
             <div class="table-responsive">
              <table class="table table-hover table-sm table-bordered table-striped">
                <thead>
                  <tr>
                  <th colspan="" rowspan="" headers="" scope="">SL</th>
                  {{-- <th colspan="" rowspan="" headers="" scope="">LastUpdated</th> --}}
                  <th colspan="" rowspan="" headers="" scope="">MacId</th>
                  <th colspan="" rowspan="" headers="" scope="">Device Name</th>
                  {{-- <th colspan="" rowspan="" headers="" scope="">Course</th> --}}
                  {{-- <th colspan="" rowspan="" headers="" scope="">GPS_status</th> --}}
                  <th colspan="" rowspan="" headers="" scope="">GPS Time</th>
                  <th colspan="" rowspan="" headers="" scope="">Send Time</th>
                  <th colspan="" rowspan="" headers="" scope="">Lat</th>
                  <th colspan="" rowspan="" headers="" scope="">Lng</th>
                  {{-- <th colspan="" rowspan="" headers="" scope="">Speed</th> --}}
                  <th colspan="" rowspan="" headers="" scope="">Alarm Details</th>
                  {{-- <th colspan="" rowspan="" headers="" scope="">Classify Describe</th> --}}
                  {{-- <th colspan="" rowspan="" headers="" scope="">Mac Name</th> --}}

                  {{-- <th colspan="" rowspan="" headers="" scope="">Seen</th>
                  <th colspan="" rowspan="" headers="" scope="">Hide</th> --}}

                  </tr>
                </thead>
                <tbody class="w3-small">
                  <?php $i = (($datas->currentPage() - 1) * $datas->perPage() + 1); ?>
                  @foreach ($datas as $data)
                  <tr class="nowrap">
                  <td>{{$i}}</td>
                    {{-- <td>{{$data->updated_at}}</td> --}}
                    <td>{{$data->macid}}</td>
                    <td>{{$data->user_name}}</td>
                    {{-- <td>{{$data->course}}</td> --}}
                    {{-- <td>{{$data->gps_status}}</td> --}}
                    <td> {!! date("Y-m-d h:i:s",$data->gps_time/1000) !!}</td>
                    <td>{!! date("Y-m-d h:i:s",$data->send_time/1000) !!}</td>
                    <td>{{$data->lat}}</td>
                    <td>{{$data->lng}}</td>
                    {{-- <td>{{$data->speed}}</td> --}}
                    <td>
                      @if ($data->type_id ==2)
                          Outgoing Fence Alarm
                      @elseif ($data->type_id ==4)
                          Enter Fence Alarm
                      @elseif ($data->type_id ==5)
                          Power Failure Alarm
                      @elseif ($data->type_id ==8)
                        Low Battry Alarm
                      @elseif ($data->type_id ==9)
                        Vibration Alarm
                      @elseif ($data->type_id ==10)
                        Motion Alarm
                      @elseif ($data->type_id ==32)
                        The Bluetooth Module
                      @elseif ($data->type_id ==37)
                        Offline Alarm
                      @elseif ($data->type_id ==55)
                        Power On
                      @elseif ($data->type_id ==67)

                        Loss Connection Alarm

                      @else
                        -
                          
                      @endif
                    </td>
                    {{-- <td>{{$data->classifyDescribe}}</td> --}}
                    {{-- <td>{{$data->macname}}</td> --}}

                    {{-- <td>
                      @if($data->seen == 0)
                      <a href="{{route('company.seenValue',['company'=>$company, $data->id])}}" class="btn btn-xs btn-default">Seen</a>
                      @else
                      <a href="#" class="btn btn-xs btn-default w3-light-gray">Unseen</a>
                      @endif
                    </td>
                    <td>
                      <a href="{{route('company.hideValue',['company'=>$company, $data->id])}}" class="btn btn-xs btn-default">Hide</a>
                    </td> --}}
                  </tr>
                  <?php $i++; ?>
                  @endforeach
                </tbody>
              </table>
            </div>
            <br>
            {{ $datas->render() }}
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

