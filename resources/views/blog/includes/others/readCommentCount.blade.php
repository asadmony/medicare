<span class="pull-right text-muted w3-hover-shadow w3-hover-text-blue small" style="cursor: pointer;">




  <span title="Read {{$post->read}} times" class=""><i class="fa fa-eye"></i> {{$post->read}} </span> &nbsp;

<i class="fa fa-comment"></i> <span class="fb-comments-count" 
 data-href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}">0</span> 

{{-- <span title="মন্তব্য {{$post->comments->count()}} টি" class=""> <i class="fa fa-comment"></i> {{$post->comments->count()}}</span> --}}

 
{{-- <span expr:share_url="{{route('welcome.postDetails',[$post])}}" name='fb_share' rel='nofollow' type='box_count'/>0</span> --}}
 

</span>