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
                               <label for="earth" class="col-md-4 control-label">Earthquake</label>

                               <div class="col-md-6">
                                   {{Form::file('earth',array('class'=>'form-control'))}}

                                   @if ($errors->has('earth'))
                                       <span class="help-block">
                                                <strong>{{ $errors->first('earth') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                        <!-- end of earthquake-->
                        <br>
                        <!-- flood-->
                        <div class="row">
                            <label for="flood" class="col-md-4 control-label">Flood</label>

                            <div class="col-md-6">
                                {{Form::file('flood',array('class'=>'form-control'))}}

                                @if ($errors->has('flood'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('flood') }}</strong>
                                       </span>
                                @endif
                            </div>
                        </div>
                        <!-- end of floode-->
                        <br>
                        <!-- rain-->
                        <div class="row">
                            <label for="rain" class="col-md-4 control-label">Rain</label>

                            <div class="col-md-6">
                                {{Form::file('rain',array('class'=>'form-control'))}}

                                @if ($errors->has('rain'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('rain') }}</strong>
                                       </span>
                                @endif
                            </div>
                        </div>
                        <!-- end of rain-->
                        <br>
                        <!-- tsunami-->
                        <div class="row">
                            <label for="tsu" class="col-md-4 control-label">Tsunami</label>

                            <div class="col-md-6">
                                {{Form::file('tsu',array('class'=>'form-control'))}}

                                @if ($errors->has('tsu'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('tsu') }}</strong>
                                       </span>
                                @endif
                            </div>
                        </div>
                        <!-- end of tsu-->


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
