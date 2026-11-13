@extends('layouts.admin')

@section('titulo', 'Dashboard')

@section('contenido')
<h1 class="h3 mb-4">Dashboard Gerencial</h1>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-success text-white shadow-sm h-100">
            <div class="card-body">
                <div class="small">Total de Insumos en Catálogo</div>
                <div class="display-6 fw-bold">{{ $totalInsumos }}</div>
                <i class="fas fa-seedling fa-2x float-end"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-primary text-white shadow-sm h-100">
            <div class="card-body">
                <div class="small">Total de Proveedores Activos</div>
                <div class="display-6 fw-bold">{{ $proveedoresActivos }}</div>
                <i class="fas fa-truck fa-2x float-end"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-warning text-dark shadow-sm h-100">
            <div class="card-body">
                <div class="small">Total de Empleados en Nómina</div>
                <div class="display-6 fw-bold">{{ $totalEmpleados }}</div>
                <i class="fas fa-users fa-2x float-end"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-dark text-white shadow-sm h-100">
            <div class="card-body">
                <div class="small">Valor Total del Inventario</div>
                <div class="h3 fw-bold">L. {{ number_format($valorInventario, 2) }}</div>
                <i class="fas fa-coins fa-2x float-end"></i>
            </div>
        </div>
    </div>
</div>
@endsection
