@extends('coordinator.layouts.adminMaster')

@section('content')
<section class="content"> 
    <br>
    @include('alerts')
    <div class="card card-widget">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-th"></i> Edit subject</h3>
          <div class="card-body">
            <form action="{{ route('coordinator.UpdateSubjectPost',$subject) }}" method="POST">
                @csrf
                <div class="form-group form-group-sm mt-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" style="min-width: 250px;" value="{{ $subject->title }}" placeholder="Enter Title">
                </div>
                
                 
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
          </div>
        </div>
    </div>
</section>
@endsection