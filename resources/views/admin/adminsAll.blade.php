@extends('admin.layouts.adminMaster')

@push('css')
<!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
  <section class="content">

    <br>
<div class="row">
      
      <div class="col-sm-12">

        @include('alerts.alerts')

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              All Admins
            </h3>
            <div class="card-tools">
                   <a class="btn btn-default text-dark btn-sm" href="#" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> Add New </a>
            </div>
          </div>
          <div class="card-body">




<div class="table-responsive">
          

          <table class="table table-hover">


            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Permission Role</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody> 

              <?php $i = 1; ?>

              <?php $i = (($usersAll->currentPage() - 1) * $usersAll->perPage() + 1); ?>

            @foreach($usersAll as $user)        

            <tr>

              <td>{{ $i }}</td>
              <td>{{$user->user->name}}</td>
              <td>{{$user->user->email}}</td>
              <td>{{$user->role_value}}</td>
               
   

              <td>

                

              <div class="btn-group btn-group-xs">
  

  <a class="btn btn-danger btn-xs" onclick="return confirm('Do you really want to delete this admin?');" href="{{route('admin.adminDelete',$user)}}">Delete</a>
 


</div>
                

              </td>
              
            </tr>

            <?php $i++; ?>

            @endforeach 
            </tbody>

          </table>

          {{ $usersAll->render() }}

        </div>



</div>
</div>
</div>
</div>



<div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content ">
            <div class="modal-header">
              <h4 class="modal-title">Create New Admin from Existing User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
 <form  class="" method="post" action="{{route('admin.adminAddNewPost')}}">
            {{csrf_field()}}             

              <label for="user"> {{ __('User ( Existing User)') }}</label>
<div class="input-group mb-3">
<select id="user"
name="user"
class="form-control user-select select2-container step2-select select2"
data-placeholder="Mobile or Email"
data-ajax-url="{{route('admin.selectNewRole')}}"
data-ajax-cache="true"
data-ajax-dataType="json"
data-ajax-delay="200"
style="">
 
</select>
<div class="input-group-append">
    
    {{-- <button class="btn btn-primary" type="button"><i class="fa fa-save"></i></button> --}}

    <a title="Add New User" target="_blank" href="{{ route('admin.newUserCreate') }}" class="btn btn-default" ><i class="fa fa-user-plus"></i></a>

</div>
{{-- @if( $errors->has('user') )
<span class="help-block">{{ $errors->first('user') }}</span>
@endif --}}
</div>
<div class="input-group">
  <div class="col-4">
    <label for="role">Position</label>
  </div>
  <div class="col-md-6 mb-2">
    <select class="form-control" name="role" id="role">
      <option value="admin" selected>Admin</option>
      <option value="coordinator">Co-ordinator</option>
    </select>
  </div>
</div>

<div >
            <button class="btn btn-sm btn-primary">Create Admin</button>
          </div>
</form>
          </div>


 
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  
  </section>
@endsection


@push('js')


 <!-- Select2 -->
<script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
  $(document).ready(function(){



      $('.select2').select2({theme: 'bootstrap4'});

  $('.step2-select').select2({
    theme: 'bootstrap4',
    // minimumInputLength: 1,
    ajax: {
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        params.page = params.page || 1;
        // alert(data[0].s);
        var data = $.map(data, function (obj) {
          obj.id = obj.email || obj.email;
          return obj;
        });
        var data = $.map(data, function (obj) {
          obj.text = obj.email;
          return obj;
        });
        return {
          results: data,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
  });


   });
</script>

@endpush

