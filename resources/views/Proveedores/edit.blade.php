@extends('layouts.admin')

@section('titulo', 'Editar Proveedor')

@section('contenido')
<h1 class="h3 mb-3">Editar Proveedor</h1>

<div class="card shadow-sm col-lg-9">
    <div class="card-body">
        <form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">RTN (14 dígitos)</label>
                    <input type="text" name="rtn" maxlength="14" class="form-control @error('rtn') is-invalid @enderror" value="{{ old('rtn', $proveedor->rtn) }}">
                    @error('rtn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label">Empresa (razón social)</label>
                    <input type="text" name="empresa" class="form-control @error('empresa') is-invalid @enderror" value="{{ old('empresa', $proveedor->empresa) }}">
                    @error('empresa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Contacto (asesor comercial)</label>
                    <input type="text" name="contacto" class="form-control @error('contacto') is-invalid @enderror" value="{{ old('contacto', $proveedor->contacto) }}">
                    @error('contacto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Teléfono (8 dígitos)</label>
                    <input type="text" name="telefono" maxlength="8" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $proveedor->telefono) }}">
                    @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoría</label>
                    <select name="categoria" class="form-select @error('categoria') is-invalid @enderror">
                        <option value="">Seleccione...</option>
                        @foreach (['Químicos', 'Semilleros', 'Maquinaria'] as $cat)
                            <option value="{{ $cat }}" {{ old('categoria', $proveedor->categoria) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Límite de crédito (L.)</label>
                    <input type="number" step="0.01" name="limite_credito" class="form-control @error('limite_credito') is-invalid @enderror" value="{{ old('limite_credito', $proveedor->limite_credito) }}">
                    @error('limite_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Días de crédito</label>
                    <select name="dias_credito" class="form-select @error('dias_credito') is-invalid @enderror">
                        <option value="">Seleccione...</option>
                        @foreach ([15, 30, 45, 60] as $dias)
                            <option value="{{ $dias }}" {{ old('dias_credito', $proveedor->dias_credito) == $dias ? 'selected' : '' }}>{{ $dias }} días</option>
                        @endforeach
                    </select>
                    @error('dias_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                        @foreach (['Activo', 'Inactivo'] as $est)
                            <option value="{{ $est }}" {{ old('estado', $proveedor->estado) == $est ? 'selected' : '' }}>{{ $est }}</option>
                        @endforeach
                    </select>
                    @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de registro</label>
                    <input type="date" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $proveedor->fecha_registro) }}">
                    @error('fecha_registro') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endsection