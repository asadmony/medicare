<div class="box-header with-border">
    <h3 class="box-title">Uploaded Contact bulks</h3>
  </div>
  <div class="box-body" style="min-height: 460px;background-color: #eee;">
    <?php $bulks = Auth::user()->uploadedContactDraftBulks(); ?>
    @if($bulks->count())
      @foreach($bulks as $bulk)

        <div class="box box-widget draft-bulk-{{$bulk->id}}">
          <div class="box-body">
            <div style="padding-bottom: 10px;">

              <a class="sms-draft-bulk pull-left w3-btn btn-xs w3-round w3-border w3-white w3-border-blue" href="{{route('admin.smsSendToUploadedContacts',$bulk)}}">Send SMS</a>
             &nbsp; &nbsp; Number of Contacts {{$bulk->contacts->count()}}
            <div class="pull-right">
              <a class="sms-draft-bulk w3-btn btn-xs w3-round w3-border w3-white w3-border-blue" href="{{route('admin.allUploadedContacts',$bulk)}}">See Contacts</a>

              <div class="btn-group btn-group-xs">
 
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
 

              <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red uploaded-contact-file-delete" href="{{route('admin.uploadedContactFileDelete',$bulk)}}" data-url="">Confirm</a></li>
            </ul>
          </div>
            </div>
              
            </div>
            
            <div style="background-color: #eee;padding:5px; ">{{$bulk->title}}</div>
          </div>
        </div>

        
      @endforeach
    @endif
    

  </div>

  <div class="box-footer">
    {{$bulks->appends(['type'=>'uploaded_contacts'])->links()}}
  </div>

 