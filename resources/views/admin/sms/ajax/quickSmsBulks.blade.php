 
  <div class="box-header with-border">
    <h3 class="box-title">Quick SMS Bulk</h3>
  </div>
  <div class="box-body" style="min-height: 460px;background-color: #eee;">
    <?php $bulks = Auth::user()->quickSmsBulks(); ?>
    @if($bulks->count())
      @foreach($bulks as $bulk)


 


      
        <div class="box box-widget  quick-sms-file-{{$bulk->id}}">
          <a class="quick-sms-bulk" href="{{route('admin.quickSmsBulkItems',$bulk)}}" style="color: #333;">
          <div class="box-body">

            From {{$bulk->sent_from}}, Number of Contacts {{$bulk->contacts->count()}}
            <div style="background-color: #eee;padding:5px; ">{{$bulk->message}}</div>
          </div>
          </a>
        </div>
      

        
      @endforeach
    @endif
    

  </div>

  <div class="box-footer">
    {{$bulks->appends(['type'=>'quick_sms'])->links()}}
  </div>
 