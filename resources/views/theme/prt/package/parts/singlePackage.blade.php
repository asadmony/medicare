<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <div class="overflow-hidden pb-2">
                            <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{$package->title}}</h2>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container pt-2 pb-4">
    <div class="row pb-4 mb-2">
        <div class="col-md-6">
            <div class="overflow-hidden">
                <h2 class="text-color-dark font-weight-normal text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="600"> <strong class="font-weight-extra-bold">Details</strong></h2>
            </div>
            <p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">{{$package->description}}</p>

            <div class="overflow-hidden mt-4">
                <h2 class="text-color-dark font-weight-normal text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1000"> <strong class="font-weight-extra-bold">Package Details</strong></h2>
            </div>
            <ul class="list list-icons list-primary list-borders text-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">
                <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Total Number of Course:</strong> {{number_format($package->no_of_courses)}}</li>

                <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Total Credit:</strong> {{$package->no_of_credits}}</li>
                
                <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Person Can Enrolled:</strong> {{$package->no_of_persons}}</li>
                <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Total Exam Attempts:</strong> {{number_format($package->no_of_attempts)}}</li>
                <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Attempt Duration:</strong> {{number_format($package->attempt_duration)}} Days</li>
                <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Package Type:</strong> {{ucfirst(str_replace('_',' ',$package->package_type))}}</li>
                <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Package Duration:</strong> {{$package->duration}} days.</li>
            </ul>
        </div>
        <div class="col-md-6 mt-5">
            <a href="{{route('user.checkoutPackage',$package)}}" class="btn btn-primary ">Check Out</a>
        </div>
    </div>
</div>