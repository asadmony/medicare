
	          <!-- Your like button code -->
<span class="pull-right fb-like w3-tiny w3-white" 
data-href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}" 
data-layout="button_count" 
{{-- data-layout="button"  --}}
data-action="like" 
data-size="small" 
data-show-faces="false" 
data-colorscheme="light" 
data-share="false">	
</span>
 
