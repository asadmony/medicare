<div class="box box-widget">
	<div class="box-body" style="min-height: 460px;">
		@foreach($contacts as $contact)
			Profile: {{$contact->directory->title}}, Number: {{$contact->verified_phone}} <br>
		@endforeach
	</div>
</div>