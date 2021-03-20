<div class="card card-widget mb-1"  id="{{$page->id}}">
	<div class="card-body" >
		<i title="Drag up or down" class="fas fa-arrows-alt-v" style="cursor: pointer"></i>
		Page ID: <b>{{ $page->id }}</b>,  
		Page Title: <b> {{ $page->page_title }}</b>, 
		Route Name: <b> {{ $page->route_name }}</b>,  
		Active: <b>{{ $page->active ? 'Yes' : 'No' }}</b>,
		List In Menu: <b>{{ $page->list_in_menu ? 'Yes' : 'No' }}</b>,
		Title Hide: <b>{{ $page->title_hide ? 'Yes' : 'No' }}</b>,

    Parts: <b> <span class="label {{ $page->items()->whereActive(true)->count() ? 'label-success' : 'label-danger' }} ">
    	{{ $page->items()->whereActive(true)->count() }}
    		</span> </b>

		<div class="float-right">
		<a class="btn btn-primary btn-sm " href="{{ route('admin.pageEdit', $page) }}">Edit</a>
	 
		<a class="btn btn-primary btn-sm " href="{{ route('admin.pageItems', $page) }}">Add Page Part</a>
		{{-- &nbsp; 
		<a class="w3-btn w3-red btn btn-xs " onclick="return confirm('Do you really want to delete?');" href="{{ route('admin.pageDelete', $page) }}">Delete</a> --}}
		</div>
	</div>
</div>