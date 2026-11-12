@extends('layouts.admin')

@section('titulo', 'Insumos')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Catálogo de Insumos</h1>
    <a href="{{ route('insumos.create') }}" class="btn btn-success">
        <i class="fas fa-plus me-1"></i> Nuevo Insumo
    </a>
</div>

<form action="{{ route('insumos.index') }}" method="GET" class="input-group mb-3">
    <input type="text" name="buscar" class="form-control" value="{{ $buscar }}" placeholder="Buscar por nombre o SKU">
    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>
    <a href="{{ route('insumos.index') }}" class="btn btn-secondary">Limpiar</a>
</form>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($insumos as $insumo)
                    <tr>
                        <td>
                            @if ($insumo->imagen)
                                <img src="{{ asset($insumo->imagen) }}" width="50" height="50" style="object-fit: cover;" class="rounded">
                            @else
                                <i class="fas fa-image fa-2x text-secondary"></i>
                            @endif
                        </td>
                        <td>{{ $insumo->codigo }}</td>
                        <td>{{ $insumo->nombre }}</td>
                        <td>{{ $insumo->categoria }}</td>
                        <td>L. {{ number_format($insumo->precio, 2) }}</td>
                        <td>
                            @if ($insumo->inventario > 20)
                                <span class="badge bg-success">{{ $insumo->inventario }} Óptimo</span>
                            @elseif ($insumo->inventario >= 10)
                                <span class="badge bg-warning text-dark">{{ $insumo->inventario }} Moderado</span>
                            @else
                                <span class="badge bg-danger">{{ $insumo->inventario }} ¡Desabastecimiento!</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('insumos.edit', $insumo) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desea eliminar este insumo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No hay insumos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $insumos->links() }}
    </div>
</div>
@endsection