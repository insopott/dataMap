<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12" align="center">
        @if(\Illuminate\Support\Facades\Session::has('messages'))
            <div class="alert-info">
                <span class="alert-info">
                    <center>{{\Illuminate\Support\Facades\Session::get('messages')}}</center>
                </span>
            </div>
        @endif
    </div>
</div>