@push('scripts')
<script>
    $('#detail_la').summernote({
      placeholder: 'ລາຍລະອຽດ',
      height: 150,
      callbacks:{
        onChange: function(contents, $editable){
          @this.set('detail_la', contents);
        }
      }
    });
    $('#detail_en').summernote({
      placeholder: 'ລາຍລະອຽດ',
      height: 150,
      callbacks:{
        onChange: function(contents, $editable){
          @this.set('detail_en', contents);
        }
      }
    });
    $('#address').summernote({
      placeholder: 'ທີ່ຢູ່',
      height: 150,
      callbacks:{
        onChange: function(contents, $editable){
          @this.set('address', contents);
        }
      }
    });
    $('#note').summernote({
      placeholder: 'ຄຳອະທິບາຍ',
      height: 150,
      callbacks:{
        onChange: function(contents, $editable){
          @this.set('note', contents);
        }
      }
    });
    $('#role').summernote({
      placeholder: 'ຄຳອະທິບາຍ',
      height: 150,
      callbacks:{
        onChange: function(contents, $editable){
          @this.set('role', contents);
        }
      }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2KPqF6KV_ch-jdx6hSVNQXhezl2mcuzk&libraries=places"
        type="text/javascript"></script>
<script>
      //get current locations
      var x = document.getElementById("demo");
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            $('#lat').val(position.coords.latitude);
            $('#long').val(position.coords.longitude);
            @this.set('lat', position.coords.latitude);
            @this.set('long', position.coords.longitude);
            var show_lat = parseFloat($('#lat').val());
            var  show_long = parseFloat($('#long').val());
            var map = new google.maps.Map(document.getElementById("map-update"), {
                    center: { lat:  show_lat, lng: show_long },
                    zoom: 8,
                    scrollwheel: true,
                });
                const uluru = { lat:  show_lat, lng: show_long };
                let marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: true
                });
                google.maps.event.addListener(marker,'position_changed',
                    function (){
                        let lat = marker.position.lat()
                        let lng = marker.position.lng()
                        $('#lat').val(lat)
                        $('#long').val(lng)
                        @this.set('lat', lat);
                        @this.set('long', lng);
                    })
                google.maps.event.addListener(map,'click',
                function (event){
                    pos = event.latLng
                    marker.setPosition(pos)
                });
        }
        if($("#lat").val() =='' && $("#long").val() ==''){
            var map = new google.maps.Map(document.getElementById("map-update"), {
                    center: { lat:  19.8563, lng: 102.4955 },
                    zoom: 5,
                    scrollwheel: true,
                });
                const uluru = { lat:  19.8563, lng: 102.4955 };
                let marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: false
                });
            }

            var z = document.getElementById("demo");
            function getLocations() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPositions);
                } else {
                    z.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPositions(position) {
            $('#lats').val(position.coords.latitude);
            $('#longs').val(position.coords.longitude);
            @this.set('lats', position.coords.latitude);
            @this.set('longs', position.coords.longitude);
            var show_lat = parseFloat($('#lats').val());
            var  show_long = parseFloat($('#longs').val());
            var map = new google.maps.Map(document.getElementById("map-update-s"), {
                    center: { lat:  show_lat, lng: show_long },
                    zoom: 8,
                    scrollwheel: true,
                });
                const uluru = { lat:  show_lat, lng: show_long };
                let marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: true
                });
                google.maps.event.addListener(marker,'position_changed',
                    function (){
                        let lat = marker.position.lat()
                        let lng = marker.position.lng()
                        $('#lats').val(lat)
                        $('#longs').val(lng)
                        @this.set('lats', lat);
                        @this.set('longs', lng);
                    })
                google.maps.event.addListener(map,'click',
                function (event){
                    pos = event.latLng
                    marker.setPosition(pos)
                });
        }
        if($("#lats").val() =='' && $("#longs").val() ==''){
            var map = new google.maps.Map(document.getElementById("map-update-s"), {
                    center: { lat:  19.8563, lng: 102.4955 },
                    zoom: 5,
                    scrollwheel: true,
                });
                const uluru = { lat:  19.8563, lng: 102.4955 };
                let marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: false
                });
            }
</script>
@endpush