    <style>
  .panel {
    background-color: rgba(0,40,68,.2);
    color: #fff;
    font-weight: bolder;
}
.panel .panel-heading{
  background-color: #fff;
}
</style>



    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Home</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <?php $ad = $me->adminData(); ?>

    <!-- Main content -->
    <section class="content" style="min-height: 700px;">

      <div class="row">
        <div class="col-sm-12">

          <div class="w3-card-4 w3-border w3-border-blue w3-round">
            <div class="box box-widget" style="margin-bottom: 0;">
              <div class="box-header with-border">
                <h3 class="box-title">
                  Welcome back, {{ $me->name }} <img src="{{ asset('img/online.gif') }}" alt="Online" style="width: 20px;">
                </h3>
              </div>
              <div class="box-body w3-animate-zoom w3-blue" style="min-height: 400px;">

                <div class="row">
                  
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.allPendingPayments')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Pen.Pay.Today
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->pending_payment_today }}
                      </div>
                    </div>
                </a>
                  </div>

                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.allPendingPayments')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Pen.Pay.{{ date('M') }}
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->pending_payment_this_month }}
                      </div>
                    </div>
                </a>
                  </div>

                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.allPaidPayments')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Paid.Pay.Today
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->paid_payment_today }}
                      </div>
                    </div>
                </a>
                  </div>

                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.allPaidPayments')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Paid.Pay.{{ date('M') }}
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->paid_payment_this_month }}
                      </div>
                    </div>
                </a>
                  </div>

                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.usersGroup','cv_new_pending')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading w3-red">
                        CV New Pending
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->cv_new_pending }}
                      </div>
                    </div>
                </a>
                  </div>

                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.usersGroup','log_users')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading w3-red">
                        Log Users
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                         {{ $ad->log_user_count }}
                      </div>
                    </div>
                </a>
                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.usersAll')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        All Users
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->all_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.usersGroup','online_users')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Online Users <img src="{{ asset('img/online.gif') }}" alt="Online" style="width: 20px;">
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->online_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.usersGroup','male_users')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Male Users
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->male_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.usersGroup','female_users')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Female Users
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->female_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.usersGroup','subscribers')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Subscribers
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->subscribers }}
                      </div>
                    </div>
                </a>
                  </div>
                  
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-bottom" href="{{route('admin.logsAll')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading w3-red">
                        All Logs
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->logs_count }}
                      </div>
                    </div>
                </a>
                  </div>
                </div>





                <div class="row">
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-opacity" href="{{route('admin.usersGroup','diamond_plus')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Diamond Plus
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->diamond_plus_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-opacity" href="{{route('admin.usersGroup','diamond')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Diamond Users
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->diamond_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-opacity" href="{{route('admin.usersGroup','golden_plus')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Golden Plus
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->golden_plus_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-opacity" href="{{route('admin.usersGroup','golden')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Golden Users
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->golden_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-opacity" href="{{route('admin.usersGroup','order_by_age')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Order by Age
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->order_by_age_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-opacity" href="{{route('admin.usersGroup','validity_10')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading w3-deep-orange">
                        Validity < 10 d
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->less_than_ten }}
                      </div>
                    </div>
                </a>
                  </div>
                </div>




                <div class="row">
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block" href="{{route('admin.usersGroup','inactive_users')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading w3-red">
                        Deactivated
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->deactivate_users }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-top" href="{{route('admin.usersGroup','final_check_pending')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading w3-yellow">
                        Not Checked
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->not_checked }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-top" href="{{route('admin.usersGroup','profile_picture_pending')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                        Profile Pic Pen
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->image_pending }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-top" href="{{route('admin.allPendingPayments')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                       Pending Payment
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->pending_payment }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-top" href="{{route('admin.proposalsGroup', 'all_proposals')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading ">
                       <img src="{{ asset('img/heart.svg') }}" style="width: 18px;" alt="Favourite Taslima Marriage Media"> Proposals
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->proposal_unchecked }}
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn w3-blue btn-block w3-animate-top" href="{{route('admin.reportsAll')}}" target="_blank">
                    <div class="panel  panel-default text-center">
                      <div class="panel-heading w3-yellow">
                       <i class="fa fa-warning"></i> Complain
                      </div>
                      <div class="panel-body w3-xlarge w3-hover-red">
                        {{ $ad->complains }}
                      </div>
                    </div>
                </a>
                  </div>
                  
                </div>





                
              </div>
              
            </div>
          </div>

        </div>
      </div>
      

    </section>
    <!-- /.content -->