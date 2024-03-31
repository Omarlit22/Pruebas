<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar un Ambiente</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="{{ asset('js/script.js') }}"></script>
    <style>
        .alert {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar Ubicación</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('ubicacion.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="input-group">
                                <div class="left-column">
                                    <br>
                                    <label for="facultad">Facultad: *</label>
                                    <input type="text" id="facultad" name="facultad" required maxlength="40"  value="{{ old('facultad') }}">
                                    @error('facultad')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>

                                    <label for="edificio">Edificio: *</label>
                                    <input type="text" id="edificio" name="edificio" required maxlength="40"  value="{{ old('facultad') }}">
                                    @error('edificio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>

                                    <label for="nroPiso">Nro de Piso: *</label>
                                    <input type="number" id="nroPiso" name="nroPiso" required  value="{{ old('facultad') }}">
                                    @error('nroPiso')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>

                                    <label for="ubicacion">Ubicación: *</label>
                                    <input type="text" id="ubicacion" name="ubicacion" required maxlength="100"  value="{{ old('facultad') }}">
                                    @error('ubicacion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="button" onclick="openMapModal()">Seleccionar Ubicación</button>
                                </div>
                            </div>

                            <div class="buttons">
                                <button type="button" class="cancel-button" id="btnCan" onclick="confirmCancel()">Cancelar</button>
                                <button type="submit" class="subir-form" id="submitBtn" onclick="return confirm('¿Estás seguro de registrar la Ubicación?')">Registrar Ubicación</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para mostrar el mapa -->
    <div id="mapModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeMapModal()">&times;</span>
            <div id="map" style="height: 400px;"></div>
            <button onclick="selectLocation()">Aceptar</button>
        </div>
    </div>

    <script>
        var map;
        var marker;

        function openMapModal() {
            document.getElementById('mapModal').style.display = 'block';
            initMap();
        }

        function closeMapModal() {
            document.getElementById('mapModal').style.display = 'none';
        }

        function selectLocation() {
            var selectedLocation = marker.getPosition();
            var selectedCoordinates = selectedLocation.lat() + ',' + selectedLocation.lng();
            document.getElementById('ubicacion').value = selectedCoordinates;
            closeMapModal();
        }

        function confirmCancel() {
            if (confirm('¿Estás seguro de cancelar el registro?')) {
            }
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -17.393590927124023, lng: -66.14656829833984 },
                zoom: 16
            });

            marker = new google.maps.Marker({
                position: { lat: 40.7128, lng: -74.0060 },
                map: map,
                draggable: true
            });

            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });
        }

        function placeMarker(location) {
            marker.setPosition(location);
        }
    </script>

    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlG2GfTLZwS3Ld-X-hLyc9MDe8NSQO5_w&callback=initMap" async defer></script>

</body>
</html>
