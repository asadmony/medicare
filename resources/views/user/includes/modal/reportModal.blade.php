
     <!-- Classic Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Report about <span class="badge badge-default w3-large"> {{ $user->username }} </span></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">



<form action="{{ route('user.reportPost', $user) }}" method="post">
 
 <div class="form-group {{ $errors->has('comment') ? ' has-danger' : '' }}">
  <label for="comment">Why Do you want to report? </label>
  <textarea class="form-control w3-border w3-padding {{ $errors->has('comment') ? ' w3-border-red' : '' }}" name="comment" rows="3" placeholder="Write details about {{ $user->username }}" id="comment">{{ old('comment') }}</textarea>
  @if ($errors->has('comment'))
    <span class="help-block">
        <strong>{{ $errors->first('comment') }}</strong>
    </span>
@endif
</div>

{{ csrf_field() }}

 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->