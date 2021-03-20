<div class="col-lg-12 order-1 order-lg-2">
    <div class="form-group col-md-6">
        <h4 class="mb-3">Select/Create Company :</h4>
        
            <form action="{{route('user.checkoutPackageCompany',$package)}}" method="get">
                @csrf
            @if($user->activeCompanies())
                @foreach($user->activeCompanies() as $company)
                    <div class="form-check">
                        <label class="form-check-label pb-3">
                            <input class="form-check-input" type="radio" name="company" data-msg-required="Please select at least one option." id="inlineRadio1" value="{{$company->id}}" {{$loop->first ? 'checked' : ''}}> {{ucfirst($company->title)}}
                        </label>
                    </div>
                @endforeach
            @endif


        <div class="form-group ml-0">

            @include('alerts.alerts')
             

            <button type="button" class="btn btn-outline btn-rounded btn-primary  btn-with-arrow mb-2" data-toggle="modal" data-target="#formModal" href="#">Create New Company<span><i class="fas fa-plus"></i></span></button>
        </div>
        <button type="submit" class="btn btn-primary">Check out</button>
        </form>

        

        {{-- modal --}}
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    

                    <form action="{{route('welcome.addNewCompany')}}" method="post">
                        @csrf
                        <div class="modal-header text-center">
                            <h4 class="modal-title " id="formModalLabel">Create New Company</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            {{-- <form id="demo-form" class="mb-4" novalidate="novalidate"> --}}
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 text-left text-sm-right mb-0">Company Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="company name" required/>

                                        @if ($errors->has('title'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('title') }}</strong>
                                          </span>
                                      @endif

                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 text-left text-sm-right mb-0">Company Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_code" class="form-control" value="{{old('company_code')}}" placeholder="Companay code" required/>
                                        @if ($errors->has('company_code'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('company_code') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 text-left text-sm-right mb-0">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="description" class="form-control" placeholder="description" required > </textarea>
                                    </div>
                                </div>
                                {{-- <div class="form-group row align-items-center">
                                    <label class="col-sm-3 text-left text-sm-right mb-0">Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" class="form-control" placeholder="Type your email..." required/>
                                    </div>
                                    <label class="col-sm-1 text-left mb-0">Mobile</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="mobile" class="form-control" placeholder="Companay Mobile" required/>
                                    </div>
                                </div> --}}
    
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 text-left text-sm-right mb-0">Address</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="address" class="form-control" placeholder="address" required > </textarea>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 text-left text-sm-right mb-0">Zip code</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="zip_code" class="form-control" placeholder="zip code" required/>
                                    </div>
                                    <label class="col-sm-1 text-left mb-0">City</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="city" class="form-control" placeholder="Companay Mobile" required/>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 text-left text-sm-right mb-0">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="country" class="form-control" placeholder="Country name" required/>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end modal --}}
    </div>
</div>