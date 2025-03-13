@extends('layouts.app')

@section('title', 'Reservaciones - ' . config('app.name'))

@section('content')
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="text-content">
                <h4>Sistema de Reservaciones</h4>
                <h2>Gestiona tus Vuelos</h2>
            </div>
        </div>
        <div class="banner-item-02">
            <div class="text-content">
                <h4>Reserva tu Vuelo</h4>
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
    <!-- Sección de Vuelos Disponibles -->
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="card-title mb-0">Vuelos Disponibles</h3>
                </div>
                <div class="card-body">
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
                                    <th>Acciones</th>
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
                                        <td>
                                            <button class="btn btn-primary btn-sm" onclick="reserveFlight('{{ $flight->_id }}')">
                                                Reservar
                                            </button>
                                        </td>
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
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
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
});

function reserveFlight(flightId) {
    // Aquí irá la lógica para reservar el vuelo
    console.log('Reservando vuelo:', flightId);
}
</script>
@endsection
