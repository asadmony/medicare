    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
        <small>Send Profile to Given Email</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Send Profile to Given Email</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="min-height: 700px;">

      <div class="row">
        <div class="col-sm-3">
          
          <div class="box box-widget">

            <div class="box-header with-border">
              <h3 class="box-title">
                Profile Info Select
              </h3>
            </div>
            <div class="box-body">
              

              <form method="post" action="{{ route('admin.selectProfileUsers') }}" class="form-select-mails-user">

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group form-group-sm">
    <label for="gender">Gender</label>
    <select name="gender" class="form-control select-parameter" id="gender">
      <option value="">Gender</option>

      <option>Male</option>
      <option>Female</option>

    </select>
  </div>

    </div>
    <div class="col-sm-6" >
      
      <div class="form-group form-group-sm">
    <label for="religion">Religion</label>
    <select name="religion" class="form-control select-parameter" id="religion">
      <option value="">Religion</option>
      {{-- ID: 4   Religion --}}
      @foreach ($userSettingFields[3]->values as $value)

      <option>{{ $value->title }}</option>

      @endforeach
    </select>
  </div>

    </div>
  </div>

  
  <div class="row">
    
    <div class="col-sm-6">
      <div class="form-group form-group-sm">
    <label for="min_age">Min Age</label>
    <select name="min_age" class="form-control select-parameter" id="min_age">
      <option value="">Min Age</option>
      @for ($i = 18; $i <= 60; $i++)
              <option>{{ $i }}</option>         
      @endfor
    </select>
  </div>

    </div>
    <div class="col-sm-6">
      
      <div class="form-group form-group-sm">
    <label for="max_age">Max Age</label>
    <select name="max_age" class="form-control select-parameter" id="max_age">
      <option value="">Max Age</option>
      @for ($i = 18; $i <= 80; $i++)
          <option>{{ $i }}</option>
      @endfor
    </select>
  </div>

    </div>
  </div>

  
  
  


  <div class="form-group form-group-sm">
    <label for="district">Home District</label>
    <select name="district" class="form-control select-parameter" id="district">
      <option value="">Home District</option>
      {{-- ID: 27   district --}}
      @foreach ($districts as $value)

      <option>{{ $value->title }}</option>

      @endforeach
    </select>
  </div>
  
  

  <div class="form-group form-group-sm">
    <label for="profession">Profession</label>
    <select name="profession" class="form-control select-parameter" id="profession">
      <option value="">Profession</option>
      {{-- ID: 27   profession --}}
      @foreach ($userSettingFields[26]->values as $value)

      <option>{{ $value->title }}</option>

      @endforeach
    </select>
  </div>

  <div class="form-group form-group-sm">
    <label for="education_level">Education Level</label>
    <select name="education_level" class="form-control select-parameter" id="education_level">
      <option value="">Education Level</option>
      {{-- ID: 26   Edu --}}
      @foreach ($userSettingFields[25]->values as $value)

      <option>{{ $value->title }}</option>

      @endforeach
    </select>
  </div>

  <div class="row">
    <div class="col-sm-6">
      
<div class="form-group form-group-sm">
    <label for="marital_status">Marital Status</label>
    <select name="marital_status" class="form-control select-parameter" id="marital_status">
      <option value="">Marital Status</option>
      {{-- ID: 11   marital_status --}}
      @foreach ($userSettingFields[10]->values as $value)

      <option>{{ $value->title }}</option>

      @endforeach
    </select>
  </div>

    </div>
    <div class="col-sm-6">

      <div class="form-group form-group-sm">
    <label for="user_type">User Type</label>
    <select name="user_type" class="form-control select-parameter" id="user_type">
      <option value="">Select User Type</option>
      <option value="online">Online</option>
      <option value="offline">Offline</option>
    </select>
  </div>
      

    </div>
  </div>

  
<div class="row">
  <div class="col-sm-6">

    <div class="form-group form-group-sm">
    <label for="order_by">Ascending/Desc</label>
    <select name="order_by" class="form-control select-parameter" id="order_by">
      <option value="desc">Descending</option>
      <option value="asc">Ascending</option>
    </select>
  </div>
    
  </div>
  <div class="col-sm-6">

    <div class="form-group form-group-sm">
    <label for="limit">User Limit</label>
    <select name="limit" class="form-control select-parameter" id="limit">

      <option value="100">100</option>

      @for($n = 25; $n <= 500; $n=$n+25)
      @if($n==100) @continue
      @endif
      <option value="{{ $n }}">{{ $n }}</option>
      @endfor
    </select>
  </div>
    
  </div>
</div>
  

  

  

  @csrf
  
   
</form>


            </div>
          </div>


        </div>
        


        <div class="col-sm-9">

          <form action="{{ route('admin.sendProfileToGivenEmailPost') }}" method="post" class="form-send-cv-from-user-post">

          <div class="box box-primary">
            <div class="box-header with-border" style="padding-left:8px;">

              

              <h3 class="box-title">
                Email: <input type="email" name="email" placeholder="Email Address" style="width: 250px;" required> (Maximum 20 profiles will be sent per mail)
              </h3> 



            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
              <div class="table-responsive mailbox-messages">
                  
                <table class="table table-hover table-striped">

                  <thead>
                    <tr>
                      <th>
                        {{-- <div class="mailbox-controls"> --}}
                <!-- Check all button -->
                <button type="button" title="Select All" class="btn btn-default btn-xs checkbox-toggle "><i class="fa fa-square-o"></i>
                </button>
              {{-- </div> --}}
                      </th>
                      <th>User</th>                      
                      <th>details</th>
                    </tr>
                  </thead>
                  <tbody class="emails-tbody">
                  @include('admin.users.ajax.emailsOfProfile')
                  </tbody>
                  <tfoot>
                    <th>
                      <button type="submit" class="btn btn-primary btn-sm btn-send">Send Profile</button>
                    </th>
                  </tfoot>

                  @csrf
                  
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /. box -->
                </form>
        </div>
        <!-- /.col -->














          
      </div>

      
      

    </section>
    <!-- /.content -->