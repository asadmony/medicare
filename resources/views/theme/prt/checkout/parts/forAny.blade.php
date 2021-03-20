<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="w3-card card mt-3">
                <img class="card-img-top"  src="{{asset('img/lw.jpg')}}" alt="Card Image">
                <div class="card-body p-2 text-center">
                    <a href="{{route('user.checkoutPackage',$package)}}">
                    <button type="submit" class="btn btn-primary btn-sm"> Individual</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card w3-card">
                <div class="w3-card card mt-3">
                    <img class="card-img-top"  src="{{asset('img/pk.jpg')}}" alt="Card Image">
                    <div class="card-body text-center p-2">
                        
                        <a href="{{route('user.checkoutPackageCompany',$package)}}"><button type="submit" class="btn btn-primary btn-sm"> Compnay</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>