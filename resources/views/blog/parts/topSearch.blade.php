  <section class="content">
    <div class="row">

     <div class="col-sm-12">

        <div class="box box-widget" style="border-radius: 0;margin-bottom: 0;">
          <div class="box-body" style="padding-bottom: 0;">

            <div class="row">
              <div class="col-sm-2">
                <a href="{{ route('welcome.blog') }}">
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


        @include('blog.includes.search.topSearch')


        
      </div>
    </div>
  </section>

  
 
