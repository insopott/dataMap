@extends('layouts.app')
@section('css')
    <style>
        #map {
            height: 400px;
            width: 100%;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div id="map"></div>
        </div>

    </div>

    <div class="modal" id="modal-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function initMap() {
            var uluru = {lat: 18.196457, lng: 120.592501};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                fullscreenControl:false,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
            var marker2 = new google.maps.Marker({
                position: {lat: 18.172905, lng: 120.593865},
                map: map
            });
            marker.addListener('click',function () {
                $('#modal-1').modal('toggle');
            });
            marker.addListener('mouseover')
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHh-ll5kEmf6lHAMXjLCFjAsHvj3SZhcc&callback=initMap">
    </script>
@endsection

