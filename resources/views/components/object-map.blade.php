@php
    /* @var \App\ReadModels\Building $building */
@endphp

<div class="object-map pt-5">
    <h3 class="object-map-title">
        Карта
    </h3>
    <div class="map img-map" id="map_canvas" style="position: relative; overflow: hidden; width: 100%; height: 450px">

    </div>

    <script
            src="https://maps.google.com/maps/api/js?sensor=true&key=AIzaSyAY4I_P_PjkK_sj6pzdgNBgCxVctEuRZw0"></script>
    <script type="text/javascript" src="{{asset('assets/js/map/jquery14.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/map/jsmaps/jquery.ui.map.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/map/jsmaps/jquery.ui.map.microformat.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/map/jsmaps/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            const position = new google.maps.LatLng(
                    {{$building->coordinate['lat']}},
                    {{$building->coordinate['lon']}}
            );
            $('.map').gmap({
                'center': position, 'zoom': 14, 'disableDefaultUI': true,
                'callback': function () {
                    var self = this
                    self.addMarker({
                        'position': this.get('map').getCenter(),
                        'icon': "{{asset('assets/images/svg/markermap.svg')}}"
                    })
                }
            })
        })
    </script>
</div>
