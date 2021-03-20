<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SMS
      <small>Drafts</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>SMS</a></li>
      <li class="active">Drafts</li>
    </ol>
  </section>

  <section class="content"> 

    <div class="row">
      <div class="col-sm-3">
        
        <div class="box box-widget">
          @include('admin.sms.ajax.draftSmsBulks')
        </div>
      </div>
        <div class="col-sm-9">
          <div class="sms-draft">
            @include('admin.sms.includes.draftSmsForm')
          </div>
        </div>
      </div>
  </section>