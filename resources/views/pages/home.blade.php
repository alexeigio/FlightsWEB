@extends('layouts.app')

@section('title', 'Inicio - ' . config('app.name'))

@section('content')
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


<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-body">
            <form id="searchForm" method="GET" class="row g-3">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="origin"
                           placeholder="Origen (ej: Stockholm)" value="{{ request('origin') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="destination"
                           placeholder="Destino (ej: Wushi)" value="{{ request('destination') }}">
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="departure_date"
                           value="{{ request('departure_date') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

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
                                            <td>{{ $flight['_id'] }}</td>
                                            <td>{{ $flight['flight_number'] }}</td>
                                            <td>{{ $flight['origin'] }}</td>
                                            <td>{{ $flight['destination'] }}</td>
                                            <td>{{ $flight['airport'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($flight['departure_datetime'])->format('d/m/Y H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($flight['arrival_datetime'])->format('d/m/Y H:i') }}</td>
                                            <td>{{ $flight['duration'] }} min</td>
                                            <td>{{ $flight['available_seats'] }}</td>
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
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $.ajax({
                url: "{{ route('home') }}",
                type: "GET",
                data: formData,
                success: function(response) {
                    $('#flightsResults').html($(response).find('#flightsResults').html());
                },
                error: function(xhr) {
                    console.error('Error en la búsqueda:', xhr.responseText);
                    alert('Ocurrió un error al realizar la búsqueda.');
                }
            });
        });
    });
</script>
@endsection
