@extends('layouts.app')

@section('title', 'Inicio - ' . config('app.name'))

@section('content')
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="text-content">
                <h4>Bienvenido a LYNX FLIGHTS</h4>
                <h2>Explora nuestros Vuelos Disponibles</h2>
            </div>
        </div>
        <div class="banner-item-02">
            <div class="text-content">
                <h4>Ofertas Especiales</h4>
                <h2>Encuentra los mejores precios</h2>
            </div>
        </div>
        <div class="banner-item-03">
            <div class="text-content">
                <h4>Últimos Asientos</h4>
                <h2>Reserva tu vuelo ahora</h2>
            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<div class="container mt-5">
    <!-- Formulario de Búsqueda -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="searchForm" class="row g-3">
                        @csrf
                        <div class="col-md-3">
                            <label for="origin" class="form-label">Origen</label>
                            <input type="text" class="form-control" id="origin" name="origin">
                        </div>
                        <div class="col-md-3">
                            <label for="destination" class="form-label">Destino</label>
                            <input type="text" class="form-control" id="destination" name="destination">
                        </div>
                        <div class="col-md-3">
                            <label for="departure_date" class="form-label">Fecha de Salida</label>
                            <input type="date" class="form-control" id="departure_date" name="departure_date">
                        </div>
                        <div class="col-md-3">
                            <label for="airport" class="form-label">Aeropuerto</label>
                            <input type="text" class="form-control" id="airport" name="airport">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Buscar Vuelos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Vuelos Disponibles -->
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="card-title mb-0">Vuelos Disponibles</h3>
                </div>
                <div class="card-body">
                    <div id="flightsTable">
                        @if(count($flights) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Número de Vuelo</th>
                                        <th>Origen</th>
                                        <th>Destino</th>
                                        <th>Aeropuerto</th>
                                        <th>Salida</th>
                                        <th>Llegada</th>
                                        <th>Duración</th>
                                        <th>Asientos Disponibles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($flights as $flight)
                                        <tr>
                                            <td>{{ $flight->_id }}</td>
                                            <td>{{ $flight->flight_number }}</td>
                                            <td>{{ $flight->origin }}</td>
                                            <td>{{ $flight->destination }}</td>
                                            <td>{{ $flight->airport }}</td>
                                            <td>{{ \Carbon\Carbon::parse($flight->departure_datetime)->format('d/m/Y H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($flight->arrival_datetime)->format('d/m/Y H:i') }}</td>
                                            <td>{{ $flight->duration }} min</td>
                                            <td>{{ $flight->available_seats }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="alert alert-info">
                            No se encontraron vuelos disponibles.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    console.log('DOM Cargado');
    
    // Inicializar el carrusel
    $('.owl-banner').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    });

    // Manejar el envío del formulario de búsqueda
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        
        console.log('Formulario enviado');
        
        // Obtener los valores del formulario
        const formData = {
            origin: $('#origin').val(),
            destination: $('#destination').val(),
            departure_date: $('#departure_date').val(),
            airport: $('#airport').val()
        };
        
        console.log('Datos del formulario:', formData);
        
        // Mostrar indicador de carga
        $('#flightsTable').html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Cargando...</span></div></div>');

        // Realizar la búsqueda AJAX
        $.ajax({
            url: '{{ route("flights.search") }}',
            method: 'GET',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Respuesta recibida:', response);
                if (response && response.length > 0) {
                    let tableHtml = `
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Número de Vuelo</th>
                                        <th>Origen</th>
                                        <th>Destino</th>
                                        <th>Aeropuerto</th>
                                        <th>Salida</th>
                                        <th>Llegada</th>
                                        <th>Duración</th>
                                        <th>Asientos Disponibles</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                    
                    response.forEach(function(flight) {
                        tableHtml += `
                            <tr>
                                <td>${flight._id}</td>
                                <td>${flight.flight_number}</td>
                                <td>${flight.origin}</td>
                                <td>${flight.destination}</td>
                                <td>${flight.airport}</td>
                                <td>${new Date(flight.departure_datetime).toLocaleString()}</td>
                                <td>${new Date(flight.arrival_datetime).toLocaleString()}</td>
                                <td>${flight.duration} min</td>
                                <td>${flight.available_seats}</td>
                            </tr>`;
                    });

                    tableHtml += `
                                </tbody>
                            </table>
                        </div>`;
                    
                    $('#flightsTable').html(tableHtml);
                } else {
                    $('#flightsTable').html('<div class="alert alert-info">No se encontraron vuelos que coincidan con los criterios de búsqueda.</div>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la petición:', error);
                console.error('Estado:', status);
                console.error('Respuesta:', xhr.responseText);
                console.error('Headers:', xhr.getAllResponseHeaders());
                $('#flightsTable').html('<div class="alert alert-danger">Error al buscar vuelos. Por favor, intente nuevamente.</div>');
            }
        });
    });
});
</script>
@endsection 