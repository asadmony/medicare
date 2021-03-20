<form class="form-inline"  method="post" action="{{ route('admin.addNewSubjectPost') }}">
  
  @csrf
  

  <div class="form-group form-group-sm">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" style="min-width: 250px;" value="{{ old('title') }}" placeholder="Enter Title">
  </div>

 
  <button type="submit" class="btn btn-primary btn-sm">Add Subject</button>
</form>