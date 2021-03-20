@if($relatedPosts)
<div class="box box-widget">
            <div class="box-header w3-panel w3-leftbar w3-border-{{$blogParameter->main_color}}">
              <h3 class="box-title">
                Suggested Posts
              </h3>
            </div>
            <div class="box-body">
            	@foreach($relatedPosts->chunk(4) as $r4)
            	<div class="row">
            		@foreach($r4 as $post)
            		 <div class="col-sm-3">
            		 	<a class="text-muted"  href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}">
				              <img class="img-responsive" src="{{ route('imagecache', [ 'template'=>'cpmd','filename' => $post->fiName() ]) }}" alt="{{$post->title}}">
				                <div class="w3-container w3-light-gray">
				                  <p style="font-weight: bold;font-size: 16px;">{{$post->title}}</p>
				                  <p>{{str_limit($post->excerpt, 60,'..')}}
				                  	@if($post->div())
				                  	<br><span>{{$post->div()}}</span>
				                  	@endif
				                  	
				                    {{-- @include('blog.includes.others.readCommentCount') --}}

				                  </p>
				                </div>
				              </a>
            		 </div>
            		@endforeach
            	</div>
            	<br>
            	@endforeach

              

 
            </div>
          </div>
@endif