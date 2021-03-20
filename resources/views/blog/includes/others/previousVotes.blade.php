		<div class="box box-widget" >
			<div class="box-header with-border">
				<h3 class="box-title">
					পূর্বের ফলাফল
				</h3>
			</div>
			<div class="box-body" style="background: #eee;">
				@foreach($votes as $vote)
<div class="box box-widget">
	<div class="box-header with-border">
		<h3 class="box-title">
		অনলাইন ভোটের ফলাফলঃ{{date('d-M-Y', strtotime($vote->date) )}}	
			
		</h3>


	</div>
	<div class="box-body">
		{{$vote->title}}
	</div>
	<div class="box-footer">
		মোট ভোটঃ {{$vote->casts->count()}} টি,
		হ্যাঁঃ {{$vote->pos()}}টি,
		নাঃ {{$vote->neg()}}টি,
		মন্তব্য নেইঃ {{$vote->sil()}}টি।

		<div class="table-responsive">
			<table class="table">
				<tbody>
					<tr>
						<td>


							<div class="progress-group">
                    <span class="progress-text">হ্যাঁ</span>
                    <span class="progress-number"><b>{{$vote->yes()}}%</b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: {{$vote->yes()}}%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->


							
                  
                  
						</td>
					</tr>

					<tr>
						<td>

							<div class="progress-group">
                    <span class="progress-text">না</span>
                    <span class="progress-number"><b>{{$vote->no()}}%</b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: {{$vote->no()}}%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
							
						</td>
					</tr>

					<tr>
						<td>
							

							<div class="progress-group">
                    <span class="progress-text">মন্তব্য নেই</span>
                    <span class="progress-number"><b>{{$vote->silent()}}%</b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: {{$vote->silent()}}%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->

						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endforeach

{{$votes->render()}}

			</div>
		</div>