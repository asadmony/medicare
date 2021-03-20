<form role="form" method="post" action="{{route('coordinator.addNewSubjectPost')}}">
    <div class="card-body">
    {{csrf_field()}}
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>