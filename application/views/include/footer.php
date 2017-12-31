<div id="cont">
    <div id="map"></div>
    <script>
        function initMap() {
            var uluru = {lat: 6.902215976621638,  lng: 79.86069999999995};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 19,
                center: uluru
            });
            var ucsc = {lat: 6.902215976621638, lng: 79.86069999999995};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: ucsc,
                mapTypeId: 'roadmap'
            });
            var marker = new google.maps.Marker({
                position: ucsc,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuVuyPajdEVimNlE-ejFP3_ca3dRNHLT4&callback=initMap"
            async defer></script>
</div>
</main>
</body>
</html>