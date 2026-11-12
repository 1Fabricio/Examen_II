@extends('layouts.admin')

@section('titulo', 'Contratar Empleado')

@section('contenido')
<div class="container-fluid px-4">
    <h1 class="mt-4">👥 Recursos Humanos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('empleados.index') }}">Empleados</a></li>
        <li class="breadcrumb-item active">Contratar Empleado</li>
    </ol>

    <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-dark text-white py-3">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-user-plus me-2"></i>Formulario de Contratación de Personal</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="identidad" class="form-label">No. Identidad / DNI (13 dígitos sin guiones)</label>
                        <input type="text" class="form-control @error('identidad') is-invalid @enderror" id="identidad" name="identidad" value="{{ old('identidad') }}" maxlength="13" required>
                        @error('identidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{ old('correo') }}" required>
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre del Colaborador</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
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
                            <option value="Ingeniero Agrónomo" {{ old('cargo') == 'Ingeniero Agrónomo' ? 'selected' : '' }}>Ingeniero Agrónomo</option>
                            <option value="Asesor Técnico de Campo" {{ old('cargo') == 'Asesor Técnico de Campo' ? 'selected' : '' }}>Asesor Técnico de Campo</option>
                            <option value="Jefe de Bodega Central" {{ old('cargo') == 'Jefe de Bodega Central' ? 'selected' : '' }}>Jefe de Bodega Central</option>
                            <option value="Operador de Maquinaria" {{ old('cargo') == 'Operador de Maquinaria' ? 'selected' : '' }}>Operador de Maquinaria</option>
                            <option value="Cajero" {{ old('cargo') == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                        </select>
                        @error('cargo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="salario" class="form-label">Sueldo Base Mensual (Lempiras)</label>
                        <input type="number" step="0.01" min="0.01" class="form-control @error('salario') is-invalid @enderror" id="salario" name="salario" value="{{ old('salario') }}" required>
                        @error('salario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                        <input type="date" class="form-control @error('fecha_ingreso') is-invalid @enderror" id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso', date('Y-m-d')) }}" required>
                        @error('fecha_ingreso')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="estado" class="form-label">Estado del Empleado</label>
                        <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                            <option value="Activo" {{ old('estado', 'Activo') == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Guardar Empleado
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection