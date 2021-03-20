 <div class="divider divider-style-4 pattern pattern-1 taller">
                                <i class="fas fa-chevron-down w3-hover-shadow"></i>
                            </div>


<section class="call-to-action call-to-action-default with-button-arrow call-to-action-in-footer w3-light-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9 col-lg-9">
                                <div class="call-to-action-content">
                                    <h3>
                                        Medicare Training has <strong class="font-weight-extra-bold">everything</strong> you need to learn in a training <strong class="font-weight-extra-bold">organization</strong>
                                    </h3>
                                     
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="call-to-action-btn">

                                    @auth
                                    <a href="{{route('home')}}" class="btn btn-modern text-2 btn-primary">My Dashboard</a><span class="arrow hlb d-none d-md-block" data-appear-animation="rotateInUpLeft" style="left: 110%; top: -40px;"></span>
                                    @else
                                    <a href="{{route('welcome.registrationOption')}}" class="btn btn-modern text-2 btn-primary">Register Now</a><span class="arrow hlb d-none d-md-block" data-appear-animation="rotateInUpLeft" style="left: 110%; top: -40px;"></span>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



<footer id="footer" class="bg-color-primary border-top-0 " style="background: #277aca !important;">
    <div class="container py-4">
       <div class="row">
           <div class="col-md-5 col-sm-6">


               <div class="py-1">
                @if(isset($websiteParameter->logo_alt))
                <p class="text-white"><img class="" alt="{{env('APP_NAME_BIG')}}" width="200" src="{{asset('storage/logo/'. $websiteParameter->logo_alt)}}"></p> 
                @else
                <p class="text-white">{{env('APP_NAME_BIG')}}</p> 
                @endif

               </div>   

               <div class="py-1">

                   <i class="fab fa-whatsapp text-4 p-relative text-white"></i>


                   
                   <a class="text-white pl-2" href="tel:{{ $websiteParameter->contact_mobile ?? '' }}">{!! $websiteParameter->contact_mobile ?? '' !!}</a> 


               </div>
               <div class="py-1">



                <i class="far fa-envelope text-4 p-relative text-white"></i>


                <a class="text-white pl-2" href="mailto:{{ $websiteParameter->contact_email ?? '' }}">
                    {!! $websiteParameter->contact_email ?? '' !!}
                </a>
            </div>

            <div class="py-1">


                <i class="fas fa-map-marker-alt text-4 p-relative text-white"></i>
                <span class="text-4 p-relative text-white">
                    {!! $websiteParameter->footer_address ?? '' !!}
                    
                 
                </span>

                 
            </div>


        </div>

        <div class="col-md-4 col-sm-6">
           <h4 class="text-white">Our Policies</h4>

           <div class=" ">
               @if (isset($footerMenuPages))
               <ul class="list list-icons list-icons-sm mb-0 text-white">
                   @foreach ($footerMenuPages as $page)
                   <li><i class="fas fa-angle-right top-8 text-white"></i> <a class="link-hover-style-1 text-white" href="{{ route('welcome.page', [$page->id,$page->route_name] ) }}">{{ $page->page_title }}</a></li>
                   @endforeach
                </ul>
               @endif

            {{-- <li><i class="fas fa-angle-right top-8 text-white"></i> <a class="link-hover-style-1 text-white" href="">Refund Policy</a></li>
            <li><i class="fas fa-angle-right top-8 text-white"></i> <a class="link-hover-style-1 text-white" href="">Terms of Use</a></li>
            <li><i class="fas fa-angle-right top-8 text-white"></i> <a class="link-hover-style-1 text-white" href="">About Us</a></li>
            <li><i class="fas fa-angle-right top-8 text-white"></i> <a class="link-hover-style-1 text-white" href="">Contact Us</a></li> --}}
             
           </div>

       </div>

       <div class="col-md-3 col-sm-6">
           <h4 class="text-white text-center">Follow Us</h4>

           <div class="pl-lg-5">

            <p class="text-6 text-center text-white">Social Media</p>

            <div class="text-center">
                

            <a class="text-white px-3" href="{{ $websiteParameter->fb_page_link ?? '' }}"><i class="fab fa-facebook text-5"></i></a>
            <a class="text-white px-3" href="{{ $websiteParameter->twitter_url ?? '' }}"><i class="fab fa-twitter text-5"></i></a>
            <a class="text-white px-3" href="{{ $websiteParameter->linkedin_url ?? '' }}"><i class="fab fa-linkedin-in text-5"></i></a>
            <br> <br>
            <div class="d-none d-sm-block">
                
            <img width="160" class="rounded" src="{{asset('img/mln.jpg')}}" alt="{{env('APP_NAME_BIG')}}">
            </div>
            
            </div>
            
 
           </div>

       </div>





   </div>
</div>


<div class="footer-copyright bg-color-primary bg-color-scale-overlay bg-color-scale-overlay-2" style="background: #1d5c99 !important;">
    <div class="bg-color-scale-overlay-wrapper">
        <div class="container py-2">

            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">

                        <p class="text-white">

                            © Copyright {{date('Y')}} | {{env('APP_NAME_BIG')}} | Site by <a class="text-white" href="{{url('https://multisoftbd.com')}}" title="Multisoft">Multisoft</a>
                            <div class="d-none">
                                © Copyright {{date('Y')}} | {{env('APP_NAME_BIG')}} | Site by <a class="text-white" href="{{url('https://a2sys.co')}}" title="#a2sys">a2sys</a>
                            </div>

                            <br>

                            <img width="160" class="rounded" src="{{asset('img/pay.png')}}" alt="Pay">

                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</footer>