@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @include('messages')
                      {!! Form::open(array('url'=>route('admin.store'),'methdo'=>'POST','files' => true,
                       'enctype'=>"multipart/form-data",'class'=>'form-horizontal')) !!}

                           @if(Auth::user()->town_id==null)
                                @include('town')
                           @else
                                <input type="hidden" name="town_id" value="{{Auth::user()->town_id}}">
                           @endif

                        <!-- earthquake-->
                           <div class="row">
                               <div class="col-md-6">
                                    {{Form::select('type',$types,null,array('class'=>'form-control'))}}
                               </div>

                               <div class="col-md-6">
                                   {{Form::file('file',array('class'=>'form-control'))}}

                                   @if ($errors->has('file'))
                                       <span class="help-block">
                                                <strong>{{ $errors->first('file') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                        <!-- end of earthquake-->
                        <br>



                           <br>
                           <div class="row">
                               <div class="col-md-4 col-md-offset-6">
                                   <button type="submit" class="btn btn-success">Upload</button>
                               </div>
                           </div>

                     {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
