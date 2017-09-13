<!-- type-->
<div class="form-group{{ $errors->has('town_id') ? ' has-error' : '' }}">
    <label for="town_id" class="col-md-4 control-label">Town</label>

    <div class="col-md-6">
        <select name="town_id" class="form-control">
            @foreach($town as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
            @endforeach
        </select>

        @if ($errors->has('town_id'))
            <span class="help-block">
                    <strong>{{ $errors->first('town_id') }}</strong>
             </span>
        @endif
    </div>
</div>