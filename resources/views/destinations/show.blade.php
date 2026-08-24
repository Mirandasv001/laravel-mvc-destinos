@extends('layouts.app')

@section('title', $destination['titulo'])

@section('content')
<div class="mb-4">
    <a href="{{ route('destinations.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Volver al catálogo
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm overflow-hidden">
            <img src="{{ asset($destination['imagen']) }}" class="img-fluid" alt="{{ $destination['titulo'] }}" style="max-height: 400px; width: 100%; object-fit: cover;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-primary">{{ $destination['categoria'] }}</span>
                    <span class="text-muted fw-semibold">
                        <i class="bi bi-geo-alt text-danger me-1"></i>{{ $destination['departamento'] }}
                    </span>
                </div>
                <h2 class="fw-bold mb-3">{{ $destination['titulo'] }}</h2>
                <p class="text-secondary">{{ $destination['descripcion'] }}</p>

                <hr class="my-4">

                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-cash-coin me-2 text-primary fs-5"></i>
                        <div>
                            <strong>Precios:</strong> <span class="text-secondary">{{ $destination['precio_entrada'] }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-clock me-2 text-primary fs-5"></i>
                        <div>
                            <strong>Horarios:</strong> <span class="text-secondary">{{ $destination['horario'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm p-4">
            <h4 class="fw-bold mb-2">Solicitar Información</h4>
            <p class="small text-muted mb-4">Completa el formulario y te contactaremos a la brevedad.</p>

            @if($errors->any())
                <div class="alert alert-danger pb-0">
                    <ul class="small">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('destinations.contact', $destination['id']) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label small fw-bold">Nombre completo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label small fw-bold">Mensaje o consulta</label>
                    <textarea name="mensaje" id="mensaje" rows="4" class="form-control" required>{{ old('mensaje') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2">
                    <i class="bi bi-send me-1"></i>Enviar Consulta
                </button>
            </form>
        </div>
    </div>
</div>
@endsection