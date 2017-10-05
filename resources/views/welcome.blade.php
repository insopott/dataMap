@extends('layouts.app')
@section('css')
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
      #legend {
            font-family: Arial, sans-serif;
            background: #fff;
            padding: 10px;
            margin: 10px;
            border: 3px solid #000;
        }
        #legend h3 {
            margin-top: 0;
        }
        #legend img {
            vertical-align: middle;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div id="map"></div>
            <div id="legend">
                <h6>Please Click the read pins</h6>
            </div>
        </div>
    </div>
    @foreach($towns as $t)
        <div class="modal fade" id="{{$t->slug}}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{$t->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if($t->images->count())
                            <!-- Nav tabs -->
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach($t->images as $image)
                                        <li role="presentation" class="{{$loop->index==0?'active':''}}" >
                                            <a href="#{{$t->slug.''.$image->id}}" aria-controls="home" role="tab" data-toggle="tab">
                                                {{$image->description}}
                                            </a>
                                        </li>
                                        <script>
                                            $('{{$t->slug.''.$image->id}} a').click(function (e) {
                                                e.preventDefault()
                                                alert('yes');
                                                $(this).tab('show')
                                            })
                                        </script>
                                    @endforeach
                                </ul>

                                <div class="tab-content">
                                    @foreach($t->images as $image)
                                        <div role="tabpanel" class="tab-pane active" id="{{$t->slug.''.$image->id}}">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <img class="image-responsive" src="{{$image->path}}" style="width: inherit">
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>

                            </div>
                         @else
                            <span>No Images</span>
                        @endif
                    </div><!-- end of modal-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
@section('scripts')
    <script>
        function initMap() {
            var towns=<?php echo json_encode($towns) ?>;
           // console.log(towns[0]);
            var uluru = {lat: 18.196457, lng: 120.592501};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                fullscreenControl:false,
                center: uluru
            });
           /* var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
            var marker2 = new google.maps.Marker({
                position: {lat: 18.172905, lng: 120.593865},
                map: map
            });
            marker.addListener('click',function () {
                $('#modal-1').modal('toggle');
            });*/
            //marker.addListener('mouseover')

            for (let [index,t] of towns.entries()){
               // console.log(t.name)
                let marker = new google.maps.Marker({
                    position: {lat:t.lat,lng:t.long},
                    label:t.slug,
                    map: map
                });

                marker.addListener('click',function () {

                    $('#'+t.slug).modal('toggle');

                });

            }//end of for of
            //legends
            var legend = document.getElementById('legend');
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);



        }
    </script>


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHh-ll5kEmf6lHAMXjLCFjAsHvj3SZhcc&callback=initMap">
    </script>
@endsection

