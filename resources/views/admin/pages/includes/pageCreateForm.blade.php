<form class="form-inline" method="post" action="{{ route('admin.pageAddNewPost') }}">

  @csrf

  <div class="form-group{{ $errors->has('page_title') ? ' has-error' : '' }}">
    <label for="page_title">Page Title:</label>
    <input type="text" class="form-control" placeholder="Page Title" id="page_title" name="page_title"
      value="{{ old('page_title') }}">
  </div>



  <div class="pl-2 form-group{{ $errors->has('route_name') ? ' has-error' : '' }}">
    <label for="route_name">Route Name:</label>
    <input type="text" placeholder="Route Name" class="form-control" id="route_name" name="route_name"
      value="{{ old('route_name') }}">
  </div>


  <div class="checkbox pl-1">
    <label><input type="checkbox" name="title_hide"> Title Hide </label>
  </div>

  <div class="checkbox pl-1">
    <label><input type="checkbox" checked name="active"> Active</label>
  </div>

  <div class="checkbox pl-1">
    <label><input type="checkbox" checked name="list_in_menu"> List In Menu</label>
  </div>

  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
</form>