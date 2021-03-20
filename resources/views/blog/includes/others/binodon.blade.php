@if($binodonCat && $binodonCat->count() > 0)
 
 
 
<div class="box box-widget w3-padding" style="border: 10px ridge #f0f0f0;margin: 5px;">
  <div class="box-header w3-panel w3-leftbar w3-border-{{$blogParameter->main_color}}">
    <h3 class="box-title">
      {{$binodonCat->title}}
    </h3>
  </div>
  <div class="box-body">

 

      @foreach($binodonCat->latestSomePosts(8)->chunk(4) as $p4)
      <div class="row">
        @foreach($p4 as $post)
          <div class="col-sm-3">
          <a title="{{$post->title}}" href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}">
            <div class="box box-widget" style="padding: 0;margin-bottom: {{$loop->parent->last ? 0 : '10px'}};">
                  <div class="box-body box-profile" style="padding: 0;">
                    <img class="img-responsive" src="{{ route('imagecache', [ 'template'=>'cpmd','filename' => $post->fiName() ]) }}" alt="{{$post->title}}">
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <h3 class="profile-username"  style="font-size: 17px;line-height: 1.3;margin-bottom: 0;">{{str_limit($post->title,48,'..')}}
                      {{-- @include('blog.includes.others.readCommentCount') --}}
                    </h3>
                    {{-- <span class="text-muted" style="font-size: 11px !important;">{{$post->div()}}</span> --}}
                  </div>
               </div>
          </a>
        </div>
        @endforeach
      </div>
      @endforeach

	</div>
</div>
 
@endif













