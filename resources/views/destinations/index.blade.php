@extends('layouts.app')

@section('title', 'Catálogo de Destinos Turísticos')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold">Catálogo de Destinos Turísticos</h1>
    <p class="text-muted">Explora los principales puntos turísticos y culturales de El Salvador.</p>
</div>

<div class="row g-4">
    @forelse($destinations as $item)
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset($item['imagen']) }}" class="card-img-top" alt="{{ $item['titulo'] }}" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-secondary mb-2 align-self-start">{{ $item['categoria'] }}</span>
                    <h5 class="card-title fw-bold mb-1">{{ $item['titulo'] }}</h5>
                    <p class="card-text text-muted small mb-3">
                        <i class="bi bi-geo-alt text-danger me-1"></i>{{ $item['departamento'] }}
                    </p>
                    <p class="card-text text-secondary small flex-grow-1">{{ Str::limit($item['descripcion'], 85) }}</p>
                    <a href="{{ route('destinations.show', $item['id']) }}" class="btn btn-outline-primary mt-3 w-100">
                        Ver Detalles
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">No hay destinos disponibles en este momento.</div>
        </div>
    @endforelse
</div>
@endsection