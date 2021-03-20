@extends('hasan.master')

@section('content')
  @include('hasan.subpage.banner-sm')
  <div class="container" style="margin-top: 30px;">
    <br />
    <div class="row">
      <div class="col-sm-12 padding-0 margin-0">
        <div class="progress">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $completed }}"
          aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
          {{ $completed }}% completed
        </div>
      </div>
    </div>
  </div>
  <br />

  <div class="row">
    <div class="col-sm-12 m-b-100">
      <div class="center- margin-bottom-20 padding-10-0">
        @isset($allowGoback)
          <a href="{{ $allowGoback }}" class="signupbutton padding-0-30 margin-bottom-15 btn btn-info pull-left">
            <span class="fa fa-caret-left"></span> Back
          </a>
        @endisset
      </div>
      @if(Session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong> {{ Session('error') }}</strong>
        </div>
        <hr>
      @endif
      @if(Session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong> {{ Session('success') }}</strong>
        </div>
        <hr>
      @endif

      <h4>Uploaded Documents</h4>
      <hr />
      <table class="table table-striped table-bordered">
        <tr>
          <th>Documents Name</th>
          <th>Documents Number</th>
          <th>Documents</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        @isset($allDoc)
          @foreach ($allDoc as $key => $value)
            <tr>
              <td>{{ documents($value->type) }}</td>
              <td>{{ ($value->document_number)?$value->document_number:"---" }}</td>
              <td>
                <img src="{{ asset("final/images/documents/{$value->url}") }}" width="100" alt="">
              </td>
              <td>{{ ($value->status)?"Approved":"Pending" }}</td>
              <td>
                <center>
                  <a href="{{ route("users.documents.edit", $value->id) }}" title="Edit"><i class="fas fa-edit fa-2x"></i></a>
                  <a href="{{ route("users.documents.delete", $value->id) }}" title="Delete"><i class="far fa-trash-alt fa-2x"></i></a>
                </center>
              </td>
            </tr>
          @endforeach
        @endisset
      </table>

      <span class="btn btn-success btn-sm" id="add-document">Add Documents</span>
      <a href="{{ route('signup.storeDocument.finished') }}" class="btn btn-info btn-sm float-right" id="finished">Finished</a>

      <form class="table table-respon" action="{{ route('signup.storeDocument.upload') }}" method="post" enctype="multipart/form-data" id="my-documents">
        @csrf
        <br /><br />
        <div class="row">
          <div class="col-sm-3">
            <label>Documents Type</label>
            <select class="form-control" name="type">
              @foreach (documents() as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-3" id="document-number">
            <label id='label_name'>National ID Number</label>
            <input type="text" name="number" value="" class="form-control">
          </div>
          <div class="col-sm-3">
            <label for="">Upload Documents</label>
            <input type="file" name="photo" value="" class="form-control">
            @if ($errors->has('photo'))
              {{ $errors->first('photo') }}
            @endif
          </div>
          <div class="col-sm-2">
            <label for="">&nbsp;</label>
            <input type="submit" name="" value="Upload" class="form-control btn btn-success">
          </div>
          <div class="col-sm-1">
            <label for="">&nbsp;</label>
            <span class="form-control btn btn-warning" id="skip">Skip</span>
          </div>
        </div>
      </form>

    </div>


    <script type="text/javascript">
    $(document).ready(function() {
      $("#my-documents").hide();
      $("#add-document").click(function(event) {
        $("#my-documents").show();
        $("#add-document, #finished").hide();
      });

      $("#skip").click(function(event) {
        $("#my-documents").hide();
        $("#add-document, #finished").show();
      });



      $("select[name='type']").change(function(event) {
        var id = parseInt($(this).val());
        if(id == 1){
          $("#document-number").show();
          $("#label_name").text("National ID Number");
        }
        else if(id == 2){
          $("#document-number").show();
          $("#label_name").text("Driving License Number");
        }
        else if(id == 3){
          $("#document-number").show();
          $("#label_name").text("Passport Number");
        }
        else{
          $("#document-number").hide();
          $("#label_name").text("");
        }
      });
    });
    </script>
  @endsection
