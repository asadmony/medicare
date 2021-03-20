
    <section class="content-header">
      <h1>
        Package
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Package</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content"> 




<!-- Info boxes -->
      <div class="row">
      <div class="col-md-12">

        <div class="box box-widget">
          <div class="box-header">
            <h3 class="box-title">
              Membership Package Edit ({{ $package->package_title }})
            </h3>
          </div>
        </div>

        

      @include('alerts.alerts')

    <div class="box box-widget">
      <div class="box-body">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.membershipPackageUpdate',$package) }}" method="post">
          
          <div class="form-group">
            <label class="control-label col-sm-3" for="title">Package Title:</label>
            <div class="col-sm-9">
              <input type="text" name="title"  required class="form-control" value="{{ old('title') ?: $package->package_title }}" id="title" placeholder="Package Title">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="description">Package Description:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="description" value="{{ old('description') ?: $package->package_description }}" required name="description" placeholder="Package Description">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="package_type">Package Type:</label>
            <div class="col-sm-9">
              <select class="form-control" name="package_type"id="package_type">
                
                @if($package->package_type)
                <option selected>{{ old('package_type') ?: $package->package_type }}</option>
                @endif

                <option>Bangladesh</option>
                <option>Outside Bangladesh</option>
              </select>
            </div>
          </div>

          @if ($package->image_name)
          <div class="row">
            <div class="col-sm-4 col-sm-offset-3">
              <img class="" width="100" src="{{ asset('storage/package/'.$package->image_name) }}" alt="{{ env('APP_NAME_BIG' . ' ' . $package->image_original_name) }}">
              <br> <br>
            </div>
          </div>

            
          @endif


          <div class="form-group">
            <label class="control-label col-sm-3" for="image">Upload Image:</label>
            <div class="col-sm-9">
              <input type="file" name="image" class="form-control" id="image">
            </div>
          </div>





          <div class="form-group">
            <label class="control-label col-sm-3" for="description">Price/Amount:</label>
            <div class="col-sm-9">
              <input type="number" min="1" required max="10000" step="any" class="form-control" id="price" value="{{ old('price') ?: $package->package_amount }}" name="price" placeholder="Package Price/Amount">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="description">Currency:</label>
            <div class="col-sm-9">
              <div class="radio">
                  <label><input type="radio" required value="BDT" name="currency" {{ $package->package_currency == 'BDT' ? 'checked' : '' }}>BDT</label>
                </div>
                <div class="radio">
                  <label><input type="radio" value="USD" name="currency" {{ $package->package_currency == 'USD' ? 'checked' : '' }}>USD</label>
                </div>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-3" for="description">Duration / Days:</label>
            <div class="col-sm-9">
              <input type="number" min="1" required max="20000" step="1" class="form-control" id="duration" value="{{ old('duration') ?: $package->package_duration }}" name="duration" placeholder="Package Duration in Day">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="description">Proposal Send Daily Limit:</label>
            <div class="col-sm-9">
              <input type="number" min="1" required max="1000" step="1" class="form-control" id="proposal_send_daily_limit" value="{{ old('proposal_send_daily_limit') ?: $package->proposal_send_daily_limit }}" name="proposal_send_daily_limit" placeholder="Proposal Send Daily Limit">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="description">Proposal Send Total Limit:</label>
            <div class="col-sm-9">
              <input type="number" min="1" required max="1000" step="1" class="form-control" id="proposal_send_total_limit" value="{{ old('proposal_send_total_limit') ?: $package->proposal_send_total_limit }}" name="proposal_send_total_limit" placeholder="Proposal Send Total Limit">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="description">Contact View Limit:</label>
            <div class="col-sm-9">
              <input type="number" min="1" required max="1000" step="1" class="form-control" id="contact_view_limit" value="{{ old('contact_view_limit') ?: $package->contact_view_limit }}" name="contact_view_limit" placeholder="Contact View Limit">
            </div>
          </div>

          {{ csrf_field() }}

          <div class="form-group">
 
            <div class="col-sm-9 col-sm-offset-3">
              <button class="btn btn-primary btn-sm" type="submit">Update</button>
            </div>
          </div>





        </form>
          </div>
        </div>
        
      </div>
    </div>

         
        
      </div>        
      </div>
      <!-- /.row -->

    </section>
