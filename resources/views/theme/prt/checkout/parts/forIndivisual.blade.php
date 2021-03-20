<div class="col-lg-9">
    <div class="accordion accordion-modern" id="accordion">

        @if($company)

 
         <div class="card card-default">
             <div class="card-header">
                 <h4 class="card-title">
                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseCompany">
                        Company Information
                    </a>
                 </h4>
             </div>
             <div id="collapseCompany" class="collapse show">
                <div class="card-body ">

      
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Company Title</label>
                                <input type="text" readonly value="{{$company->title}}" class="form-control">
                            </div>
          
                        </div>
  
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Company Code </label>
                                <input type="text" readonly value="{{$company->company_code}}" class="form-control">
                            </div>
                        </div>
 
                </div>
            </div>
         </div>
        @endif
        <div class="card card-default">
            <div class="card-header">
                <h4 class="card-title m-0">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Order Information
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="collapse show">
                <div class="card-body ">

                    <form action="{{ route('welcome.checkoutPost',['package'=>$package,'company'=>$company]) }}"
                        method="post" id="frmBillingAddress">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Full Name</label>
                                <input type="text" readonly value="{{$user->name}}" class="form-control">
                            </div>
          
                        </div>
  
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">email </label>
                                <input type="text" readonly value="{{$user->email}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <button class="btn btn-primary w3-right btn-modern text-uppercase "
                                type="submit">Place Order</button>
                            {{-- <input type="submit" value="Place Order" name="proceed" class="btn btn-primary w3-right btn-modern text-uppercase mt-5 mb-5 mb-lg-0"> --}}


                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-lg-3">
    <h4 class="text-primary">Totals</h4>
    <table class="cart-totals">
        <tbody>
            <tr class="cart-subtotal">
                <th>
                    <strong class="text-dark">Total</strong>
                </th>
                <td>
                    <strong class="text-dark"><span class="amount">£{{$package->price}}</span></strong>
                </td>
            </tr>

            <tr class="total">
                <th>
                    <strong class="text-dark">Order Total</strong>
                </th>
                <td>
                    <strong class="text-dark" style="font-size: 11px !important;"><span class="amount">£
                            {{$package->price}}</span></strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
