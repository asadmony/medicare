  <div class="box box-widget draft-bulk-{{$bulk->id}}">
  <div class="box-header with-border">
    <h3 class="box-title">All Contacts of <b class="label label-default">{{$bulk->title}}</b></h3>
  </div>
  <div class="box-body">

    <table class="table table-condensed table-striped">
      <thead>
        <tr>
          <th>SL</th>
          <th>Mobile</th>
          <th>Name</th>
          <th>Company</th>
          <th>Area</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($bulk->contacts as $contact)

        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$contact->mobile}}</td>
          <td>{{$contact->name or ''}}</td>
          <td>{{$contact->company or ''}}</td>
          <td>{{$contact->area or ''}}</td>
          <td>
            <div class="btn-group btn-group-xs">
 
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
 

              <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red uploaded-contact-delete" href="{{route('admin.uploadedContactDelete',$contact)}}" data-url="">Confirm</a></li>
            </ul>
          </div>

          </td>
        </tr>
        @endforeach
      </tbody>

    </table>

    
  </div>
</div>