@extends('layouts.app')

@section('title', 'Reservaciones - ' . config('app.name'))

@section('content')
<div class="page-heading products-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Sistema de Reservaciones</h4>
                    <h2>Gestiona tus Vuelos</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <!-- Sección de Vuelos Disponibles -->
    <div class="row">
        <div class="col-md-12 mb-4">
            <h3>Vuelos Disponibles</h3>
            @if(count($flights) > 0)
            <table class="table table-striped">
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
            @else
            <p>No se encontraron vuelos.</p>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Cargado');
});
</script>
@endsection
