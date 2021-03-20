@extends('company.layouts.companyMaster')

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
             <i class="fa fa-list"></i> Company Details of <span class="badge badge-default">{{ $company->title }}</span>
            </h3>
          </div>
          <div class="card-body w3-light-gray pb-0">
            <div class="row">
          <div class="col-sm-12 col-md-10   offset-md-1 col-lg-8 offset-lg-2">



            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span class="badge badge-light">
                  
              Company Information

                </span> 
                <a class="btn btn-primary btn-sm" href="{{ route('company.companyDetailsUpdate', $company) }}"> <i class="fa fa-edit"></i> Update </a>
            </h3>
              </div>
              <div class="card-body" style="min-height: 200px;">


                <div class="col-md-8 offset-2">
        <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username">{{ $company->title }}</h3>
                <h5 class="widget-user-desc">{{ $company->description }}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset($company->logo()) }}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    {{-- <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block --> --}}
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Services</h5>
                      <span class="description-text"></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    {{-- <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div> --}}
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>

              
            </div>
            <!-- /.widget-user -->
      </div>


                <div class="table-responsive">
                  <table class="table table-sm">
                    <tbody>

                      <tr>
                        <th> Company Owner</th>
                        <td>{{ $company->user->name }}, ({{ $company->user->email }}), ({{ $company->user->mobile }})</td>
                      </tr>

                      <tr>
                        <th>Company Title</th>
                        <td>{{ $company->title }}</td>
                      </tr>

                      <tr>
                        <th>Company Description</th>
                        <td>{{ $company->description }}</td>
                      </tr>

                      <tr>
                        <th>Email</th>
                        <td>{{ $company->email }}</td>
                      </tr>
                      <tr>
                        <th>Mobile</th>
                        <td>{{ $company->mobile }}</td>
                      </tr>
                      <tr>
                        <th>Address</th>
                        <td>{{ $company->address }}</td>
                      </tr>

                      <tr>
                        <th>Zip Code</th>
                        <td>{{ $company->zip_code }}</td>
                      </tr>

                      <tr>
                        <th>City</th>
                        <td>{{ $company->city }}</td>
                      </tr>

                      <tr>
                        <th>Country</th>
                        <td>{{ $company->country }}</td>
                      </tr>
                      
                      <tr>
                        <th>Status</th>
                        <td>{{ $company->status }}</td>
                      </tr>

                      <tr>
                        <th>Last Login</th>
                        <td>{{ $company->loggedin_at }}</td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>


                
              </div>
            </div>
          </div>
        </div>



          </div>
      </div>
  </div>
</div>


  
  </section>
@endsection


@push('js')

@endpush

