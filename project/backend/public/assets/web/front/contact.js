/*
{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{-- 
    ----------------------------------------------------------------------------
    說明 : 
    ----------------------------------------------------------------------------   
    
    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}
*/

function initialize() {
    var mapOptions = {
        zoom: 16,
        //center: new google.maps.LatLng(-34.397, 150.644)
    };

    var map;

    // https://developers.google.com/maps/documentation/geocoding/intro?hl=zh-tw
    // http://blog.yslin.tw/2013/02/google-map-api.html
    $.get("http://maps.googleapis.com/maps/api/geocode/json?address=桃園市市政府&sensor=false&language=zh-tw", 
    function(result){
        //alert(result.results[0].geometry);  
        mapOptions.center = new google.maps.LatLng(result.results[0].geometry.location.lat, result.results[0].geometry.location.lng);
        map = new google.maps.Map(
            document.getElementById('map'),
            mapOptions);
    });

    
    
  
    

    
    
}
function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' +
        '&signed_in=true&callback=initialize';
    document.body.appendChild(script);
}
  
$(function(){     
    google.maps.event.addDomListener(window, 'load', initialize);
});