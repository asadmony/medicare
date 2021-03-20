      @foreach($catsAll->chunk(2) as $cat2)
      <div class="row">

        @foreach($cat2 as $cat)
        <div class="col-sm-6">

          <div class="box box-widget">
            <div class="box-header w3-panel w3-leftbar w3-border-{{$blogParameter->main_color}}">
              <h3 class="box-title">
                {{$cat->title}}
              </h3>
            </div>
            <div class="box-body">

              <div class="row">
            <div class="col-sm-6">
              
              <a class="text-muted"  href="{{route('welcome.postDetailsWithTitle',['post'=>$cat->latestPost(), 'title'=>new_slug($cat->latestPost()->title)])}}">
              <img class="img-responsive" src="{{ route('imagecache', [ 'template'=>'cpmd','filename' => $cat->latestPost()->fiName() ]) }}" alt="{{ $cat->latestPost()->title }}">
                <div class="w3-container w3-light-gray">
                  <p style="font-weight: bold;font-size: 16px;">{{$cat->latestPost()->title}}</p>
                  <p>{{str_limit($cat->latestPost()->excerpt, 60,'..')}}
                    <?php $post = $cat->latestPost(); ?>
                    {{-- @include('blog.includes.others.readCommentCount') --}}

                  </p>
                </div>
              </a>
            </div>

            <div class="col-sm-6">
              {{--  <ul class="w3-ul w3-light-gray"> --}}
              @foreach($cat->latestPosts() as $post)              
              {{-- <li>
                <a class="text-muted" title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
                {{str_limit($post->title, 50,'..')}}
                </a>
              </li>  --}}

              @include('blog.includes.others.sidebarPostForFront')           
              @endforeach
              {{-- </ul> --}}
            </div>
          </div>
              
            </div>
          </div>

          
          
          
        </div>
        @endforeach        
      </div>
      @endforeach