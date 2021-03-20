 
  <div class="box-header with-border">
    <h3 class="box-title">Business SMS Bulk</h3>
  </div>
  <div class="box-body" style="min-height: 460px;background-color: #eee;">
    <?php $bulks = Auth::user()->smsBulks(); ?>
    @if($bulks->count())
      @foreach($bulks as $bulk)

        <div class="box box-widget business-sms-file-{{$bulk->id}}">

          <div class="box-header">
            <a class="business-sms-bulk pull-left w3-btn btn-xs w3-round w3-border w3-white w3-border-blue" href="{{route('admin.businessSmsBulkItems',$bulk)}}">Details</a>
            <div class="box-tools pull-right">
      <div class="btn-group btn-group-xs">
 
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
 

              <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red business-sms-file-delete" href="{{route('admin.businessSmsBulkDelete',$bulk)}}" data-url="">Confirm</a></li>
            </ul>
          </div>
    </div>
          </div>

          

          <div class="box-body">

            {{$bulk->category}}, {{$bulk->thana}} <br>
            From {{$bulk->sent_from}}, Number of Contacts {{$bulk->contacts->count()}}
            <div style="background-color: #eee;padding:5px; ">{{$bulk->message}}</div>
          </div>
        </div>
 

        
      @endforeach
    @endif
    

  </div>

  <div class="box-footer">
    {{$bulks->appends(['type'=>'business_sms'])->links()}}
  </div>

 