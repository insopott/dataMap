@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Towns</td>
                            <td>email</td>
                            <td>Name</td>
                            <td>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse($all as $a)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$a->town->name}}</td>
                                <td>{{$a->email}}</td>
                                <td>{{$a->name}}</td>
                                <td>&nbsp;</td>
                            </tr>
                       @empty
                           <tr>
                               <td colspan="5" align="center">No Accounts</td>
                           </tr>
                       @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
