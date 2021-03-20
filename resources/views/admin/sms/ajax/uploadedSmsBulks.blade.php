 
  <div class="box-header with-border">
    <h3 class="box-title">Uploaded SMS Bulk</h3>
  </div>
  <div class="box-body" style="min-height: 460px;background-color: #eee;">

    <?php $bulks = Auth::user()->uploadedSmsBulks(); ?>
    @if($bulks->count())
      @foreach($bulks as $bulk)




      


        <div class="box box-widget draft-bulk-{{$bulk->id}}">
          <a class="uploaded-sms-bulk" href="{{route('admin.uploadedSmsBulkItems',$bulk)}}" style="color: #333;">
          <div class="box-body">





            Title: {{$bulk->title}}, From {{$bulk->sent_from}}, Number of Contacts {{$bulk->contacts->count()}}

            

            <div style="background-color: #eee;padding:5px; ">{{$bulk->message}}</div>
          </div>
          </a>
        </div>
      





        
      @endforeach
    @endif
    

  </div>

  <div class="box-footer">
    {{$bulks->appends(['type'=>'uploaded_sms'])->links()}}
  </div>
 