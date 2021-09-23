<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PHP_Task</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH_o6ex-2o3_IqUcDKEtP8tk2n3CMemM4&libraries=places&callback=initAutocomplete" async defer></script>
            
            
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <!-- Styles -->

    <style>
        #map {
			width: 100%;
			height: 400px;
            margin-bottom:20px;
		}
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    PHP_Task
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            @yield('content')
            <br>
            <br>


            <form action="{{url('/store_address')}}" method="POST">
            @csrf
                
                    
                    <div class="form-group row">
                        
                        <div class="col-sm-6">
                            <h3>Address 1</h3>
                            <input type="text" class="form-control" name="addres1" id="autocomplete1" onFocus="geolocate()" placeholder="Address">
                        </div>
                        <div class="col-sm-6">
                            <h3>Address 2</h3>
                            <input type="text" class="form-control" name="addres2" id="addres2" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="city1" id="locality1" placeholder="City" disabled="true">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="state1" id="state1" placeholder="State" disabled="true">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="city2" id="locality2" placeholder="City" >
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="state2" id="state2" placeholder="State">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="zipcode1" id="postal_code1" placeholder="Zip Code" disabled="true">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="country1" id="country1" placeholder="Country" disabled="true">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="zipcode2" id="postal_code2" placeholder="Zip Code" >
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="country2" id="country2" placeholder="Country" >
                        </div>
                    </div>

                        <!-- <span style="border-left: 6px solid green; height: 300px; "></span> -->
                    


                    <!-- Success message -->
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="clearfix"></div>
                <hr>
                <button class=" btn btn-success float-right btn-submit"  id="btnSave" style="color:white; margin-bottom: 10px;">Save</button>
            </form>
            <br>
            <br>
            <div id='map'></div>
        </div>
        <div class="col-sm-2"></div>
    </div>

    
  
</body>
</html>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
     $(document).ready(function () {
        dtable = $('#tbl').DataTable( {
        "lengthMenu": [[5, 10, 50], [5, 10, 50]],
        "targets": 'no-sort',
        "bSort": false,
        });
    });

var p={
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "LineString",
        "coordinates": [
          [
            74.234619140625,
            31.5691754490709
          ],
          [
            72.784423828125,
            33.7243396617476
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          74.2291259765625,
          31.573855555238104
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          72.7789306640625,
          33.73804486328907
        ]
      }
    }
  ]
}
  

    var street   = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'),
		dark  = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png');

	var map = L.map('map', {
		center: [30.15, 71.59],
		zoom: 5,
		layers: [street]
	});

	var baseLayers = {
		"Street": street,
		"Dark": dark
	};

	L.control.layers(baseLayers).addTo(map);

    L.geoJson(p).addTo(map);
        
      


    var placeSearch, autocomplete;
  var componentForm = {
    // street_number: 'short_name',
    // route: 'long_name',
    locality1: 'long_name',
    state1: 'short_name',
    country1: 'long_name',
    postal_code1: 'short_name'
  };

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete1')),
    {types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>
