<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'identidad',
        'nombre',
        'apellido',
        'correo',
        'cargo',
        'salario',
        'fecha_ingreso',
        'estado',
    ];

    public static function reglas($id = null)
    {
        return [
            'identidad' => ['required','digits:13',Rule::unique('empleados', 'identidad')->ignore($id)],
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => ['required','email',Rule::unique('empleados', 'correo')->ignore($id)],
            'cargo' => 'required|in:Ingeniero Agrónomo,Asesor Técnico de Campo,Jefe de Bodega Central,Operador de Maquinaria,Cajero',
            'salario' => 'required|numeric|gt:0',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo',
        ];
    }
}