@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                       <form url="{{route('admin.store')}}" method="post" files="true" enctype="multipart/form-data">
                           {{csrf_field()}}
                           @if(Auth::user()->town_id==null)
                                @include('town')
                           @else
                                <input type="hidden" name="town_id" value="{{Auth::user()->town_id}}">
                           @endif
                           <br>
                            <br>
                            <br>
                           <div class="row">
                               <label for="photos" class="col-md-4 control-label">Upload Files</label>

                               <div class="col-md-6">
                                   <input type="file" name="photos"  class="form-control">

                                   @if ($errors->has('photos'))
                                       <span class="help-block">
                                                <strong>{{ $errors->first('photos[]') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <br>
                           <div class="row">
                               <div class="col-md-4 col-md-offset-6">
                                   <button type="submit" class="btn btn-success">Upload</button>
                               </div>
                           </div>

                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
