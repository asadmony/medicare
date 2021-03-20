<div class="w3-border-top w3-border-light-gray">
<h3 class="mt-0">Public Photos</h3>
<div style="min-height: 100px;">

	<div class="d-flex flex-wrap  align-content-start mb-4" >

        @foreach ($user->userPhotos as $photo)
        <div class="flex-fill p-1">
            
        @include('user.photos.includes.photo')
        </div>

    @endforeach
    </div>
	
</div>
</div>

