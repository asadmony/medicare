@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')
  <section class="content">

  	<br>


  	<div class="row">
      
      <div class="col-sm-12">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              All Companies of User {{ $user->email }}
            </h3>
          </div>
          <div class="card-body">




<div class="table-responsive">
          

          <table class="table table-hover">


{{-- user_id
title
description
login_code
login_password
school_id
login_type
loggedin_at
mobile
email
address
zip_code
city
country
status --}}


            <thead>
              <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Company Code</th>
                {{-- <th>Password</th> --}}
                {{-- <th>Login Type</th> --}}
                {{-- <th>Last Login</th> --}}
                <th>Mobile</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody> 

              <?php $i = 1; ?>

              <?php $i = (($companiesAll->currentPage() - 1) * $companiesAll->perPage() + 1); ?>

            @foreach($companiesAll as $company)        


            <tr>

            	<td>{{ $i }}</td>
            	<td>{{ $company->title }}</td>
            	<td>{{ $company->login_code }}</td>
            	{{-- <td>{{ $company->login_password }}</td> --}}
            	{{-- <td>{{ $company->login_type }}</td> --}}
            	{{-- <td>{{ $company->loggedin_at }}</td> --}}
            	<td>{{ $company->mobile }}</td>
            	<td>{{ $company->email }}</td>
            	<td>{{ $company->status }}</td>

            	<td>

            		

            	<div class="btn-group btn-group-xs">
  

  <a class="btn btn-primary btn-xs" href="{{ route('admin.companyEdit', $company) }}">Edit</a>
   {{-- <a class="btn btn-primary btn-xs" href="{{ route('admin.companyProducts', $company) }}">Devices</a> --}}
  {{-- <a class="btn btn-primary btn-xs" href="{{ route('admin.companyChangeStatus', $company) }}">Change Status</a> --}}

</div>
            		

            	</td>
              
            </tr>

            <?php $i++; ?>

            @endforeach 
            </tbody>

          </table>

          {{ $companiesAll->render() }}

        </div>



</div>
</div>
</div>
</div>


  
  </section>
@endsection


@push('js')

@endpush

