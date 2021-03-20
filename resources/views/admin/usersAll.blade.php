@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')
  <section class="content">

  	<br>

    <div class="row mb-2">
      <div class="col-md-12">
        <div class="card card-primary card-outline mb-2">
          <div class="card-header">
            <h3 class="card-title">User Search</h3>
    
            <div class="card-tools">
            <form action="">
                
              <div class="input-group input-group-sm" style="width: 250px;">
                <input 
                data-url="{{ route('admin.userSearchAjax') }}"
                 type="text" name="q" class="form-control ajax-data-search" placeholder="Search user">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
              </form>
            </div>
            <!-- /.card-tools -->
          </div>
            </div>
        <!-- /.card -->
      </div>
    </div>
  	<div class="row">
      
      <div class="col-sm-12">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              All Users <a class="btn w3-white btn-sm" href="{{ route('admin.newUserCreate') }}"><i class="fa fa-plus"></i> add new user</a>
            </h3>
          </div>
          <div class="card-body  ajax-data-container">



            @include('admin.modules.allUsersTable')



</div>
</div>
</div>
</div>


  
  </section>
@endsection


@push('js')

@endpush

