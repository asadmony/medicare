@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
@include('hasan.subpage.topmenubar')
<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('hasan.subpage.leftmenu')
    <div class="col-sm-9">
          <h4>Upload Documents</h4>
          <hr />

          @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
              {{ Session::get('success') }}
            </p>
          @endif
          @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
              {{ Session::get('error') }}
            </p>
          @endif

          <form class="table table-respon" action="{{ route('users.documents.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-3">
                <label>Documents Type</label>
                <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                <select class="uk-input" name="type">
                  @foreach (documents() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Relativeship
                  </span>
                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                </button>
              </div>
              </div>
              <div class="col-sm-3" id="document-number">
                <label id='label_name'>National ID Number</label>
                <input type="text" name="number" value="" class="uk-input">
              </div>
              <div class="col-sm-3">
                <label for="">Upload Documents</label>
                <input type="file" name="photo" value="" class="uk-input">
                @if ($errors->has('photo'))
                  {{ $errors->first('photo') }}
                @endif
              </div>
              <div class="col-sm-2">
                <label for="">&nbsp;</label>
                <input type="submit" name="" value="Upload" class="form-control btn btn-success">
              </div>
            </div>
          </form>

          <br />
          <br />
          <h4>All Documents</h4>
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
      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(document).ready(function() {
    $("select[name='type']").change(function(event) {
      var id = parseInt($(this).val());
      if(id == 1){
        $("#label_name").text("National ID Number");
      }
      else if(id == 2){
        $("#label_name").text("Driving License Number");
      }
      else if(id == 3){
        $("#label_name").text("Passport Number");
      }
      else{
        $("#label_name").text("Job ID Number");
      }
    });
  });
  </script>
@endsection
