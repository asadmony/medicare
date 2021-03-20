
  <section class="content">
    <div class="row">

     <div class="col-sm-12">

        <div class="box box-widget" style="border-radius: 0;margin-bottom: 0;">
          <div class="box-body" style="padding-bottom: 0;">

            <div class="row">
              <div class="col-sm-2">
                <a href="{{route('welcome.blog')}}">
             {{-- <img src="{{ route('imagecache', [ 'template'=>'lh','filename' => $blogParameter->logo() ]) }}" class="img-responsive" alt="{{$blogParameter->h1}}" style=""> --}}
             <img src="{{asset($blogParameter->logo())}}" class="img-responsive" style="max-width: 80px;margin-top: -10px;border-radius: 4px;border:2px solid #fff;" alt="{{$blogParameter->h1}}">
          </a>
              </div>
              <div class="col-sm-10">

                {{-- top ad --}}
            @include('blog.includes.adv.topAdd')
              </div>
            </div>


 
            {{-- top menubar --}}
            @include('blog.includes.menubars.topMenubar')


            {{-- news scroll --}}
            @include('blog.includes.others.newsScroll')
          </div>
        </div>



        @include('blog.includes.others.update')

        <div class="row">
          <div class="col-sm-9">


            <div class="row">
              <div class="col-sm-7">
              
                {{-- front carausel --}}
                @include('blog.includes.others.frontCarausel')

                {{-- division news --}}
                @include('blog.includes.others.divNews')


                {{-- place for add --}}
                @include('blog.includes.adv.frontLeft1')


                {{-- crime news --}}
                {{-- @include('blog.includes.others.crimeNews') --}}

                {{-- place for add --}}
                @include('blog.includes.adv.frontLeft2')


                {{-- place for add --}}
                @include('blog.includes.adv.frontLeft3')



              </div>

              <!-- 18 start -->
              <div class="col-sm-5">


          {{-- popular and latest --}}
        @include('blog.includes.others.popularAndLatest')



          {{-- front latest --}}
        {{-- @include('welcome.includes.others.frontLatest') --}}
        {{-- @include('welcome.includes.others.randomPosts') --}}


        {{-- @include('blog.includes.others.videoGallery')   --}}



                
              </div>
            </div>

        <div class="row">
          <div class="col-sm-12">
            
          {{-- country area --}}
            @include('blog.includes.others.countryArea')
            

          {{-- highlight area --}}
          @include('blog.includes.others.highlightArea')
          

          </div>
        </div>



          
          

          </div>

          <!-- col 3 12 start -->
          <div class="col-sm-3">

            {{-- place for tv code --}}
            @if(Browser::isDesktop())
                @include('blog.includes.adv.tvCode')

                <br>
            @endif

            

            {{-- place for ad --}}
                {{-- @include('blog.includes.adv.frontRight1') --}}

                {{-- <br> --}}


            @include('blog.includes.search.divDistThanaSearch')



              {{-- <br> --}}

              {{-- @include('blog.includes.others.archive')

              <br> --}}

              {{-- place for ad --}}
                {{-- @include('blog.includes.adv.salahTime') --}}

                <br>


                {{-- place for add --}}
                @include('blog.includes.adv.frontRight2')


                <br>


                {{-- @include('blog.includes.others.vote')

                <br> --}}

                {{-- @include('blog.includes.others.counterMap') --}}

               @if(Browser::isDesktop())
               @include('blog.includes.others.fbPageArea')
                @endif

                {{-- <br>  --}}

                
 
              
 

          </div>
          <!-- col 12 start -->
        </div>

        {{-- @include('blog.includes.others.slideshow') --}}

        

        @include('blog.includes.others.binodon')

        @include('blog.includes.others.catPostsFrontBottom')

        
      </div>
    </div>
  </section>

  
 
