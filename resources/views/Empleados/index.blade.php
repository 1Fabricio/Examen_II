@extends('layouts.admin')

@section('titulo', 'Planilla de Empleados')

@section('contenido')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h1 class="h3 text-dark mb-0">👥 Recursos Humanos - Planilla Oficial</h1>
            <small class="text-muted">AGROVALLE HONDURAS - Control de Personal</small>
        </div>
        <a href="{{ route('empleados.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-user-plus me-1"></i> Contratar Empleado
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-dark text-white py-3">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-id-card me-2"></i>Personal Activo en Sucursal</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">ID</th>
                            <th>No. Identidad / DNI</th>
                            <th>Nombre Completo</th>
                            <th>Correo Electrónico</th>
                            <th>Puesto / Cargo</th>
                            <th class="text-end">Salario Mensual</th>
                            <th class="text-center">Fecha Ingreso</th>
                            <th class="text-center" style="width: 150px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($empleados as $empleado)
                        <tr>
                            <td class="text-center text-muted fw-bold">{{ $empleado->id }}</td>
                            <td><code>{{ $empleado->identidad }}</code></td>
                            <td class="fw-bold text-dark">{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                            <td>{{ $empleado->correo }}</td>
                            <td><span class="badge bg-success">{{ $empleado->cargo }}</span></td>
                            <td class="text-end fw-bold text-success">L. {{ number_format($empleado->salario, 2) }}</td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($empleado->fecha_ingreso)) }}</td>
                            <td class="text-center">
                                <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm me-1" title="Editar Expediente">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Confirma que desea retirar a este empleado de la nómina oficial?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Dar de Baja">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-5">
                                <i class="fas fa-users-slash fa-3x mb-3 text-secondary d-block"></i>
                                No hay empleados registrados en la planilla. Haz clic en <strong>Contratar Empleado</strong> para registrar personal.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $empleados->links() }}
            </div>
        </div>
    </div>
</div>
@endsection