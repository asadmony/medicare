<form class="form-inline" method="post" action="{{route('admin.placeAndPricePost')}}">

  {{csrf_field()}}

                      <div class="form-group {{ $errors->has('from') ? ' has-error' : '' }}">
                        <label for="from">Place From:</label>
                        <input type="text" name="from" value="{{old('from')}}" placeholder="Place From" class="form-control" id="from">
                        @if ($errors->has('from'))
                        <span class="help-block">
                            <strong>{{ $errors->first('from') }}</strong>
                        </span>
                    @endif
                      </div>

                      <div class="form-group {{ $errors->has('to') ? ' has-error' : '' }}">
                        <label for="to">Place To:</label>
                        <input type="text" name="to" value="{{old('to')}}" placeholder="Place To" class="form-control" id="to">
                        @if ($errors->has('to'))
                        <span class="help-block">
                            <strong>{{ $errors->first('to') }}</strong>
                        </span>
                    @endif
                      </div>

                      <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">Price (Tk):</label>
                        <input type="text" name="price" value="{{old('price')}}" placeholder="Price" class="form-control" id="price">
                        @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                      </div>


                      <button type="submit" class="btn btn-primary">Add</button>

                    </form>