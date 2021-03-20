@if($mediaAll->count())
@foreach($mediaAll->chunk(2) as $media2)
<div class="row">
	@foreach($media2 as $media)
		<div class="col-sm-6">
			<div class="card card-default" style="margin-bottom: 5px;">
					<div class="card-body">



<div class="media border ">
	<div class="w3-display-container">
  <img src="{{asset($media->file_url)}}" alt="John Doe" class="mr-1   rounded" style="width:100px;">

  <div class="w3-display-topright"><a onclick="return confirm('Do you really want to delete this media?');" style="margin-right: 4px;margin-top: 3px;" class="btn btn-default btn-xs" title="Delete" href="{{route('admin.mediaDelete',$media)}}"><i class="fa fa-times"></i></a></div>

</div>
  <div class="media-body"   style=" word-wrap: break-word;word-break: break-all;">
    {{-- <h4> <small>{{url('/'.$media->file_url)}}</small></h4> --}}
    <p>
    Orig.Name: {{$media->file_original_name}} <br>
				    Size: {{human_filesize($media->file_size)}}, 
				    Width: {{$media->width}}px, 
				    Height: {{$media->height}}px <br>

				    <small> {{url('/'.$media->file_url)}}  </small> <br>

				    <button class="copyboard btn btn-primary btn-xs" data-text="{{url('/'.$media->file_url)}}">Copy to Clipboard</button>
				</p>
  </div>
</div>



					 
						
					</div>
				</div>
		</div>
	@endforeach
</div>
@endforeach

<div class="pull-right">
	{{$mediaAll->render()}}
</div>

@endif 
