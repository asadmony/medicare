<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Uploaded
      <small>Contacts</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Uploaded</a></li>
      <li class="active">Contacts</li>
    </ol>
  </section>

  <section class="content"> 

    <div class="row">
      <div class="col-sm-3">

        <div class="box box-widget">
          @includeIf('admin.sms.includes.excelContactForm')
        </div>

        <div class="box box-widget">
          @include('admin.sms.ajax.uploadedContactBulks')
        </div>
      </div>
      <div class="col-sm-6">
          <div class="sms-draft">
            
          </div>
      </div>
    </div>

  </section>