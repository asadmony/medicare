  <div class="main main-raised">
    <div class="profile-content ">
        <div class="container ">
    <div class="row">
        <div class="col-sm-12">
            

{{-- @include('user.includes.others.profileHead') --}}

<br> <br> 

<div class="row">
    <div class="col-sm-3">

        @include('user.includes.others.myLeftMenu')
 
    </div>
    <div class="col-sm-9">
        <div class="user-setting-container">
            

             @foreach($payments as $payment)
 
   
              <div class="card">
                <div class="card-body">
                  @include('user.payments.includes.paymentDetails')
                </div>
              </div>
 
            
          @endforeach
 
 
        <div class=" text-center">
              {{$payments->render()}}
            </div> 

        </div>        
    </div>
</div>
 

</div>
</div>
</div>
        </div>
    </div>
