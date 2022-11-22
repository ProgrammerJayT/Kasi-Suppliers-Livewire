<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tab-title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    @livewireStyles

</head>

<body>
    @livewire('partials.blackbar')
    @livewire('partials.navbar')

    {{ $slot }}

    @livewireScripts

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    {{-- Turbo for SPA --}}
    <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>

    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var autocomplete;
            var id = 'enter-address';

            autocomplete = new google.maps.places.Autocomplete((document.getElementById(id)), {
                types: [
                    'geocode',
                ],
                componentRestrictions: {
                    country: "ZA"
                },
                fields: [
                    'place_id',
                    'geometry',
                    'name',
                ]
            });

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();

                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    document.getElementById(id).value = '';
                    return;
                } else {

                    console.log(JSON.stringify(place.address_components));

                    var lat = place.geometry.location.lat();
                    var lng = place.geometry.location.lng();
                    var location = {
                        lat: lat,
                        lng: lng,
                    };

                    console.log(JSON.stringify(location));
                    document.getElementById('set-address').value = JSON.stringify(location);
                }
            });
        });
    </script>
    <script>
        $('#acc').change(function() {
            $('#location').attr('disabled', !this.checked)
        });
    </script>
    <script>
        Livewire.on('cartUpdated' => {
            alert('A post was added with the id of: ');
        })
    </script>
</body>

</html>
