    @include('alerts')
 
 <div class="box box-widget">
      <div class="box-header with-border">
        <h3 class="box-title">
          Upload Excel File 
        </h3>
      </div>
        <div class="box-body">
        <div class="row">
          <div class="col-xs-12">
          



  <form class="" method="post" action="{{route('admin.uploadExcelContactFilePost')}}" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title" placeholder="Title for Contacts File Bulk">
      @if($errors->has('title'))
      <span class="help-block">
          <strong>{{ $errors->first('title') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group  {{ $errors->has('file') ? ' has-error' : '' }}">
      <label for="file">Excel File</label>
 
        <input type="file" class="form-control" name="file"  id="file" style="padding-bottom: 32px;">
          <span class="text-muted">Upload File with <span class="text-red "><b>Name, Company, Area, Mobile</b></span> column. <span class="text-red "><b>Mobile field is required</b></span>. This file should carry only one sheet named <span class="text-red "><b>'Sheet1'</b></span></span>

        @if($errors->has('file'))
          <span class="help-block">
            <strong>{{ $errors->first('file') }}</strong>
          </span>
        @endif
 
    </div>

 
  
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


          </div>
        </div>
        </div>
     </div>