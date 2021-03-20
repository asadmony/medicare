
    <section class="content-header">
      <h1>
        Reports
        <small>All</small>
      </h1>
    </section>



    <!-- Main content -->
    <section class="content"> 




<!-- Info boxes -->
      <div class="row">
      <div class="col-md-12">

      @include('alerts.alerts')

        <div class="card- card-widget">
          {{-- <h3 class="card-title"><i class="fa fa-th"></i> All Reports</h3> <br> --}}
          <div class="card">
            <div class="card-body with-border">
              <form action="{{ route('admin.report.filter') }}" method="get">
                <div class="row">
                  <div class="col-md-3 d-flex ">
                    <label class="w3-large-" for="from">From </label>
                    <input class="form-control form-control-sm w-75" type="date" name="from" id="from" value="{{ $from ?? '' ?? '' }}">
                  </div>
                  <div class="col-md-3 d-flex ">
                    <label class="w3-large-" for="to">To </label>
                    <input class="form-control form-control-sm w-75" type="date" name="to" id="to" value="{{ $to ?? '' }}">
                  </div>
                  <div class="col-md-3 d-flex ">
                    <label class="w3-large-" for="for">For </label>
                    <select class="form-control form-control-sm w-75" name="for" id="for" value="{{ old('for') }}">
                      <option value="">All</option>
                      <option value="membership_student" @if(isset($for) && $for == 'membership_student') selected @endif>Membership</option>
                      <option value="user_credit" @if(isset($for) && $for == 'user_credit') selected @endif>Credit</option>
                      <option value="taken_package" @if(isset($for) && $for == 'taken_package') selected @endif>Package</option>
                      <option value="taken_course" @if(isset($for) && $for == 'taken_course') selected @endif>Course</option>
                      <option value="taken_exam" @if(isset($for) && $for == 'taken_exam') selected @endif>Course Exam</option>
                    </select>
                  </div>
                  <div class="col-md-1  ">
                    <button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i> filter</button>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="dropdown show py-1 float-right mr-5">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ucfirst($type)}}
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('admin.report',"form-yesterday") }}">From Yesterday</a>
                        <a class="dropdown-item" href="{{ route('admin.report',"from-last-week") }}">From Last Week</a>
                        <a class="dropdown-item" href="{{ route('admin.report',"from-last-month") }}">From Last Month</a>
                      </div>      
                    </div>
                  </div>
                </div>
              </form>
                
                
              </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-sm ">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Trans. Amount</th>
                      <th>From</th>
                      <th>For</th>
                      <th>User</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = (($history->currentPage() - 1) * $history->perPage() );
                    @endphp
                  @foreach($history as $trans)
                    <tr>            
                      <td>
                        {{ $i+$loop->iteration }}.
                      </td>
                      <td>
                        {{ now()->parse($trans->transaction_date)->format('d-M-Y h:m A') }}
                      </td>
        
                      <td>
                        £ {{ $trans->transferred_credit }}
                      </td>
        
                      <td>
                        {{ $trans->credit_from }}
                      </td>
         
                      <td>
                          {{ $trans->credit_for }}
                      </td>
                      <td>
                          @if ($trans->company_id != null)
                            <b><i>(C)</i></b> {{ $trans->company->title }}
                          @else
                          <b><i>(U)</i></b> {{ $trans->user->name }}
                          @endif
                      </td>
                    </tr>
                  @endforeach
                  <tr>
                    <th></th>
                      <th></th>
                      <th>Total: £ {{ $totalTrans }}</th>
                      <th></th>
                      <th></th>
                      <th></th>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card-footer text-center">
              @if (isset($from) OR isset($to) OR isset($for))
              {{$history->appends([
                'from' => $from ?? '',
                'to' => $to ?? '',
                'for' => $for ?? '',
               ])->render()}}
              @else
              {{$history->render()}}
              @endif
            </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->


    </section>
