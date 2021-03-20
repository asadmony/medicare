 
<style>
  .course-caption {

    margin-top: -100px;    
}

  


@media only screen and (max-width: 600px) {
  .course-caption {
    margin-top: -20px;  

  }
  .text-6{
    font-size: 18px !important;
  }
  
}

</style>

{{-- <section class="page-header page-header-modern page-header-background page-header-background-md overlay- overlay-color-dark- overlay-show overlay-op-7-" style="background-image: url({{asset('images/topbanner.jpg')}});">
                    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2">
                        <div class="overflow-hidden pb-2">
                            <h1 class="  font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{$course->title}}</h1>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section> --}}

<div class="content">


    @php
    $rand = rand(1,3);
    $topb = 'img/topbanner'. $rand . '.jpg';
    @endphp
     <img class="img-fluid" src="{{asset($topb)}}" alt="Subject">
</div>

 <div class="container appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">
     <div class="course-caption">
        <div class="row">
            <div class="col-sm-12">
                <div class="w3-card rounded">
                    
                <div class="card card-default">
                    <div class="card-body">
                          <div class="row">
                              <div class="col-sm-7">

                                <img src="{{ route('imagecache',['template'=>'cplg', 'filename'=>$course->usliveFi()]) }}" class="img-fluid rounded w-100" alt="img">

                                <h1 class="  font-weight-bold text-6"  >{{$course->title}}</h1>

                          <p>{!! $course->excerpt !!}</p>


                                  
                              </div>
                              <div class="col-sm-5">


                             
              <div class="w3-border w3-container w3-border-light-gray rounded">


                                    <h3 class="text-primary">Course Key Points</h3> 

 
            <p class=""> 
                <b>Course Code:</b> <span class="badge badge-primary">{{ $course->course_code }}</span> <br>
                <b>Subject Area:</b> {{$course->subject ? $course->subject->title : ''}} <br>
                <b>Duration:</b> {{ $course->duration_one }} months
              {{ $course->duration_two ? ' / ' . $course->duration_two . ' months' : '' }} {{ $course->duration_three ? ' / ' . $course->duration_three . ' months' : '' }} <br> 
              <b>Mode:</b> {{ ucfirst($course->course_mode) }} <br>
              <b>Credit:</b> {{ ucfirst($course->course_credit) }}
            
            </p>

            @if($course->course_brochure)
            <p>
              <a class="btn btn-block btn-primary box-shadow-2 btn-lg mb-3" href="{{ asset($course->brochureLink()) }}" download style="background: #0077d6;padding: 5px;color:#fff;text-align: left;"><i class="fa fa-download"></i> Download Brochure</a>
            </p>

            @endif

            @if($course->syllabus_file)
            <p>
              <a class="btn btn-block btn-primary box-shadow-2 btn-lg mb-3" href="{{ asset($course->syllabusLink()) }}" download style="background: #0077d6;padding: 5px;color:#fff;text-align: left;"><i class="fa fa-download"></i> Download Syllabus</a>
            </p>

            @endif
            

            @auth

            <div class="text-center mb-3">
                            
@if ($course->packageable)

{{-- <style type="text/css">
  html {
  scroll-behavior: smooth;
}
</style> --}}

<a class="btn btn-lg  w3-deep-orange btn-block w3-hover-shadow" href="#coursepackagearea">Take Containing Package</a>

@else
<button class="btn btn-lg  w3-deep-orange btn-block"   data-toggle="modal" data-target="#modalBuyCredit" >Take this {{ Str::ucfirst($course->course_mode) }}</button>




{{-- modal is in prt\course\singleCourseDetails.blade.php --}}

@endif
</div>

                        @else

                        <div class="text-center mb-3">

                        <a class="btn btn-lg  w3-deep-orange btn-block w3-hover-shadow" href="{{route('welcome.registrationOption')}}">Register Now and Take This Course</a>
                        </div>

                        @endauth

              </div>

 

                              </div>
                          </div>

                          
                    </div>
                </div>
                </div>
            </div>
        </div>
     </div>
 </div>

  <div class="divider mb-0">
                <i class="fas fa-chevron-down"></i>
              </div>

 <section class=" w3-container  with-button-arrow call-to-action-in-footer w3-light-gray py-4">


                    <div class="container text-center">

                      <div class="row">
                        <div class="col-sm-3">

                          <div>
                            
                           <p class="">
                            <b>
                         Course Code

                           </b> <br>
                        <span class="badge badge-primary">{{ $course->course_code }}</span></p>
                          </div>

                          
                          
                        </div>
                        <div class="col-sm-3">


                          <div>
                            
                           <p class="">
                            <b>
                         Course Assesments

                           </b> <br>
                       {{ $course->assesments }}</p>
                          </div>
                          
                        </div>
                        <div class="col-sm-3">


                          <div>
                            
                           <p class="">
                            <b>
                         Accreditation

                           </b> <br>
                       {{ $course->accreditation }}</p>
                          </div>


                          
                        </div>
                        <div class="col-sm-3">


                          <div>
                            
                           <p class="">
                            <b>
                         Duration

                           </b> <br>
                        {{ $course->duration_one }} months
              {{ $course->duration_two ? ' / ' . $course->duration_two . ' months' : '' }} {{ $course->duration_three ? ' / ' . $course->duration_three . ' months' : '' }}</p>
                          </div>
                          
                        </div>
                      </div>


                         
                    </div>
                </section>


<br> <br> <br>
 
<div class="container ">



    <div class="row ">
        <div class="col-md-5 mb-4 mb-md-0">

             <div class="overflow-hidden">
                <h2 class="text-color-primary font-weight-normal text-5  mb-0" > <strong class="font-weight-extra-bold">Description</strong></h2>
            </div>

            <p class="text-justify" style="white-space: pre-line;">{!! $course->description  !!}</p>

 
             
        </div>
        <div class="col-md-5">

            <div class="overflow-hidden">
                <h2 class="text-color-primary font-weight-normal text-5  mb-0" > How To Apply </h2>
            </div>


            <p class="text-justify" style="white-space: pre-line;">{!! $course->how_to_apply  !!}</p>
             
             

             
             
        </div>
        <div class="col-md-2">
          @if ($course->face_to_face == true)
          <a class="btn btn-primary btn-block" href="{{ route('welcome.faceToFace', $course) }}" >Face to Face</a>
          
            @endif
        </div>
    </div>

</div>



<div class="w3-gray w3-container py-3" id="coursepackagearea">
  <div class="container">
    <h3 class="w3-text-white text-center">Packages Containing This {{ ucfirst($course->course_mode) }}</h3>

    <br>


 

       
                <div class="toggle toggle-primary m-0 w3-card" data-plugin-toggle>

            @foreach($packages as $pcg)
     


                <section class="toggle m-0  w3-hover-shadow" style="border-bottom: 1px solid gray;">
                  <a class="toggle-title rounded-0">{{$pcg->title}} (For {{$pcg->package_for}})</a>
                  <div class="toggle-content w3-light-gray px-2 ">

                    <div class="w3-white w3-container p-lg-3">

                      @auth
                      
                    
                    <p class="card-text">Package for {{ucfirst($pcg->package_for)}}</p>
                        <p class="card-text">Package Duration <b>{{$pcg->duration}} Days.</b></p>
                        <p class="card-text">Total Credits <b>{{number_format($pcg->no_of_credits)}}</b></p>
                        <p class="card-text">Price <b>£{{$pcg->price}}</b></p>
                        <div class="text-center mb-3">
                            <a href="{{route('welcome.packageDetails',$pcg)}}" class="btn btn-dark btn-sm btn-modern">Details</a>
                        <a href="{{route('user.checkoutPackage',$pcg)}}" class="btn btn-success btn-sm btn-modern">
                            check out
                        </a>
                        </div>

                      @else

                      <div class="text-center">
                        

 
                         <p>
                           
                         Please, Login and see the package details.  
                         </p> 
                         
                        <a class="btn btn-primary" href="{{route('login')}}">Login</a>
                      </div>
                     

                      @endif
                    </div>

                  </div>
                </section>

                 
                 

            @endforeach
                 
              </div>
    

 

 
  </div>
</div>


