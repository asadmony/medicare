<div id="printArea">

            <div class="box-widget">
              <div class="card-body pt-0"  style="min-height: 500px;">


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
                   <th>Status</th>
                   <th>Online/Offline</th>
                   <th width="200">Action</th>
                 </tr>
               </thead>
   
               <tbody>
   
                  <?php $i = (($items->currentPage() - 1) * $items->perPage() + 1); ?>
   
               @foreach($items as $key => $product)
   
   
   
   
               <tr class="">
                 <td>{{ $i }}</td>
                 <td>{{ $product['title'] }}</td>
                 <td>{{ $product['platenumber'] }}</td>
                 <td>{{ $product['macid'] }}</td>
                 {{-- <td>{{ $product['objectid'] }}</td> --}}
                 <td>{{  date("d/m/Y h:i:s",$product['update_time']/1000) }}</td>
                 {{-- <td>{{  date("d/m/Y h:i:s",$product['server_time']/1000) }}</td> --}}
                 {{-- <td>{{  date("d/m/Y h:i:s",$product['gps_time']/1000) }}</td> --}}
   
   
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
   
       {{-- <button type="button" data-url="{{ route('subrole.productStatus',['subrole'=>$subrole, 'macid'=>$product['macid'],'platenumber'=>$product['platenumber']]) }}" class="dropdown-item btn btn-primary btn-xs states-modal-lg">States</button> --}}
   
       {{-- <button type="button" data-url="{{ route('subrole.productVersion',['subrole'=>$subrole, 'macid'=>$product['macid'], 'platenumber'=>$product['platenumber']]) }}" class="dropdown-item btn btn-primary btn-xs states-modal-lg">Version</button> --}}
   
       {{-- <button type="button" data-url="{{ route('subrole.productSettings',['subrole'=>$subrole, 'macid'=>$product['macid'], 'platenumber'=>$product['platenumber']]) }}" class="dropdown-item btn btn-primary btn-xs states-modal-lg">Settings</button> --}}
   
       <a onclick='window.open("{{ url('http://fdweb.18gps.net/user/playback.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$subrole->school_id.'&mapType=GOOGLE&custid='.$subrole->school_id.'&loginUrl=&mds='.$subrole->mds.'&objectid='.$product['objectid'].'&custname='.$product['platenumber']) }}", "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=180,left=10,width=1300,height=500")' class="dropdown-item btn btn-primary btn-xs" href="#">Playback</a>
   
       <a onclick='window.open("{{ url('http://fdweb.18gps.net/user/tracking.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$subrole->school_id.'&mapType=GOOGLE&custid='.$subrole->school_id.'&loginUrl=&mds='.$subrole->mds.'&objectid='.$product['objectid'].'&custname='.$product['platenumber']) }}", "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=180,left=10,width=1300,height=500")' class="dropdown-item btn btn-primary btn-xs" href="#">Track & Control(Monitor)</a>
   
   
       
       
       <a  class="dropdown-item btn btn-primary btn-xs" href="{{ route('subrole.singleDeviceAllData',['subrole'=>$subrole, 'product'=>$product]) }}">All Data</a>
       <a  class="dropdown-item btn btn-primary btn-xs" href="{{ route('subrole.singleDeviceAlarmData',['subrole'=>$subrole, $product->macid]) }}">All Alarm Data</a>
       <a  class="dropdown-item btn btn-primary btn-xs" href="{{ route('subrole.singleDeviceMap',['subrole'=>$subrole, $product->macid]) }}">Map</a>
   
   
   
   
     </div>
   </div>
   
   
   {{-- <div class="btn-group btn-group-xs mb-1">
   </div>
   
   <div class="btn-group btn-group-xs">
   </div> --}}
   
   
   
                   {{-- <a class="btn btn-primary btn-sm" href="{{ url('http://fdweb.18gps.net/user/tracking.html?v=2020.181.077.12.32&lang=en&monitorUrl=&requestSource=web&school_id='.$subrole->school_id.'&mapType=GOOGLE&custid='.$subrole->school_id.'&loginUrl=&mds='.$subrole->mds.'&objectid='.$product->objectid.'&custname='.$product->platenumber) }}">Monitor</a> --}}
   
                 </td>
                 {{-- <td> <a target="_blank" href="{{ route('subrole.productMonitor',['subrole'=> $subrole, 'product'=>$product]) }}">Monitor</a></td> --}}
   
   
   
   
               </tr>
   
               <?php $i++; ?>
   
               @endforeach
   
   
               </tbody>
   
             </table>
   
           </div>
   
           {{ $items->appends([
             'type' => isset($type) ? $type : null,
            'status' => isset($status) ? $status : null
           ])->render() }}
   
             </div>
            </div>
          </div>