<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SMS
      <small>Analytics</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>SMS</a></li>
      <li class="active">Analytics</li>
    </ol>
  </section>

  <section class="content"> 

    {{-- <div class="row">
      <div class="col-sm-3">
        
        <div class="box box-widget">
          @include('admin.sms.ajax.businessSmsBulks')
        </div>
      </div>
        <div class="col-sm-9">
          <div class="business-sms-items">
            
          </div>
        </div>
      </div> --}}
      <div class="row">
        <div class="col-sm-3">
          
        <div class="box box-widget">
          @include('admin.sms.ajax.quickSmsBulks')
        </div>        
      </div>

      <div class="col-sm-9">
          <div class="quick-sms-items">
            
          </div>
      </div>

    </div>

    {{-- <div class="row">
        <div class="col-sm-3">          
        <div class="box box-widget">
          @include('admin.sms.ajax.uploadedSmsBulks')
        </div>        
      </div>

      <div class="col-sm-9">
          <div class="uploaded-sms-items">
            
          </div>
      </div>
    </div> --}}

  </section>