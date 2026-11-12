@extends('layouts.admin')

@section('titulo', 'Editar Empleado')

@section('contenido')
<div class="container-fluid px-4">
    <h1 class="mt-4">👥 Recursos Humanos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('empleados.index') }}">Empleados</a></li>
        <li class="breadcrumb-item active">Editar Empleado</li>
    </ol>

    <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-dark text-white py-3">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-user-edit me-2"></i>Actualizar Expediente de: {{ $empleado->nombre }} {{ $empleado->apellido }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('empleados.update', $empleado) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="identidad" class="form-label">No. Identidad / DNI (13 dígitos sin guiones)</label>
                        <input type="text" class="form-control @error('identidad') is-invalid @enderror" id="identidad" name="identidad" value="{{ old('identidad', $empleado->identidad) }}" maxlength="13" required>
                        @error('identidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{ old('correo', $empleado->correo) }}" required>
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre del Colaborador</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido', $empleado->apellido) }}" required>
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cargo" class="form-label">Puesto / Cargo</label>
                        <select class="form-select @error('cargo') is-invalid @enderror" id="cargo" name="cargo" required>
                            <option value="">Seleccione un cargo...</option>
                            <option value="Ingeniero Agrónomo" {{ old('cargo', $empleado->cargo) == 'Ingeniero Agrónomo' ? 'selected' : '' }}>Ingeniero Agrónomo</option>
                            <option value="Asesor Técnico de Campo" {{ old('cargo', $empleado->cargo) == 'Asesor Técnico de Campo' ? 'selected' : '' }}>Asesor Técnico de Campo</option>
                            <option value="Jefe de Bodega Central" {{ old('cargo', $empleado->cargo) == 'Jefe de Bodega Central' ? 'selected' : '' }}>Jefe de Bodega Central</option>
                            <option value="Operador de Maquinaria" {{ old('cargo', $empleado->cargo) == 'Operador de Maquinaria' ? 'selected' : '' }}>Operador de Maquinaria</option>
                            <option value="Cajero" {{ old('cargo', $empleado->cargo) == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                        </select>
                        @error('cargo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="salario" class="form-label">Sueldo Base Mensual (Lempiras)</label>
                        <input type="number" step="0.01" min="0.01" class="form-control @error('salario') is-invalid @enderror" id="salario" name="salario" value="{{ old('salario', $empleado->salario) }}" required>
                        @error('salario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                        <input type="date" class="form-control @error('fecha_ingreso') is-invalid @enderror" id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}" required>
                        @error('fecha_ingreso')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="estado" class="form-label">Estado del Empleado</label>
                        <select class="form-select @error('estado', $empleado->estado) is-invalid @enderror" id="estado" name="estado" required>
                            <option value="Activo" {{ old('estado', $empleado->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ old('estado', $empleado->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-sync-alt me-1"></i> Actualizar Empleado
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection