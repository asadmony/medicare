@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')

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

        <form class="table table-respon" action="{{ route('users.documents.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ $selected->id }}">
          <div class="row">
            <div class="col-sm-3">
              <label>Documents Type</label>
              <select class="form-control" name="type">
                @foreach (documents() as $key => $value)
                  <option {{ ($selected->type == $key)?" selected":"" }} value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3" id="document-number">
              <label id='label_name'></label>
              <input type="text" required name="number" value="{{ $selected->document_number }}" class="form-control">
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
              <input type="submit" name="" value="Update" class="form-control btn btn-success">
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(document).ready(function() {
    if(@php echo $selected->type @endphp == 1){
      $("#document-number").show();
      $("#label_name").text("National ID Number");
    }
    else if(@php echo $selected->type @endphp == 2){
      $("#document-number").show();
      $("#label_name").text("Driving License Number");
    }
    else if(@php echo $selected->type @endphp == 3){
      $("#document-number").show();
      $("#label_name").text("Passport Number");
    }
    else{
      $("#document-number").hide();
      $("#label_name").text("");
    }


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
        $("#document-number").text("");
      }
    });
  });
  </script>
@endsection
