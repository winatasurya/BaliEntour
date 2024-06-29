<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    

<nav class="bg-white border-gray-200 dark:bg-gray-900" id="navbar-sticky">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section>
<div id="map" class=""></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7OY-SafGpc-rTdGZUWlCHkEdi0a_zAh0&loading=async&callback=initMap" async defer></script>

<script type="text/javascript">
    var map;
    var location;
    var marker;
    var infoWindow;
    var directionDisplay;
    var directionService;
    var data = <?php echo json_encode($location)?>;

    function initMap(){
        infoWindow = new google.maps.InfoWindow;

        var mapOption={
            zoom: 12,
            center : new google.maps.LatLng(-8.6832672, 115.2393396),
            mapTypeId : google.maps.MapTypeId.ROADMAP,
            scrollWheel : true,
            streetViewControl : true,
            mapTypeControl : true,
        }
        map = new google.maps.Map(document.getElementById('map'),mapOption);

        navigator.geolocation.getCurrentPosition(getLocation);
        function getLocation(position){
            curLat = position.coords.latitude;
            curLong = position.coords.longitude;
            addMarker(curLat, curLong, "My Location");
        }

        // navigator.geolocation.getCurrentPosition(function(position){
        //    curLat = position.coords.latitude;
        //    curLong = position.coords.longitude;
        //    console.log(curLat+" , "+curLong);
        // });

        for(var i = 0; i < data.length; i++){
            addMarker(data[i]['lat'], data[i]['long'], data[i]['nama']);
        }
    }

    function addMarker(lat, long, info) {
        var iconUrl = "https://www.iconpacks.net/icons/2/free-location-map-icon-2956-thumb.png";

        marker = new google.maps.Marker({
            map: map,
            position: { lat: lat, lng: long },
            title: info,
            icon: {
                url: iconUrl,
                scaledSize: new google.maps.Size(40, 40)
            }
        });
        var isi = "<table border=1>"+
        "<tr>"+
        "<td>Nama</td>"+
        "<td>Lat</td>"+
        "<td>Long</td>"+
        "</tr>"+
        "<tr>"+
        "<td>"+info+"</td>"+
        "<td>"+lat+"</td>"+
        "<td>"+long+"</td>"+
        "</tr>"+
        "</table>"+
        "<br><button onclick = 'getDirection("+lat+", "+long+")'>Get Direction</button>";
        bindInfoWindow(marker,map,infoWindow,isi);
    }
    function bindInfoWindow(marker, map, infoWindow, info){
        google.maps.event.addListener(marker, 'click', function(){
            infoWindow.setContent(info);
            infoWindow.open(map, marker);
        })
    }
    function calculateAndDisplayRoute(origin_pos, destination_pos, directionService, 
    directionDisplay, mode){
        directionService.route({
            origin : origin_pos,
            destination: destination_pos,
            travelMode : google.maps.TravelMode[mode],
        },function(response, status){
            if(status == google.maps.DirectionsStatus.OK){
                directionDisplay.setDirections(response);
            }else{
                alert('Error');
            }
        });
    }

    function getDirection(destLat, destLong){
        var destFrom = curLat+ "," +curLong;
        var destTo = destLat + "," +destLong;
        var mode = "DRIVING";
        console.log(destFrom);
        console.log(destTo);
        infoWindow.close();
        if(directionDisplay !== undefined){
            directionDisplay.setMap(null);
        }
        directionDisplay = new google.maps.DirectionsRenderer({suppressMarkers:true});
        directionService = new google.maps.DirectionsService;
        directionDisplay.setMap(map);
        calculateAndDisplayRoute(destFrom,destTo,directionService,directionDisplay,mode);
        // console.log(destFrom);
        // console.log(destTo);
    }

</script>

</section>


<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>