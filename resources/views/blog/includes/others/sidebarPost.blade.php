<div class="attachment-block clearfix">
    <a href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}">
      <img class="attachment-img" src="{{ route('imagecache', [ 'template'=>'cpsm','filename' => $post->fiName() ]) }}" alt="{{$post->title}}">
    </a>

    <div class="attachment-pushed">
      <h4 class="attachment-heading" style="font-size: 14px;line-height: 1.3;">
        <a href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}">{{$post->title}}</a></h4>
      <p>{{str_limit($post->excerpt, $limit = 30, $end = "..")}} <a href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}"> More...</a>

      	{{-- @include('blog.includes.others.readCommentCount') --}}

      </p>
    </div>
  </div>