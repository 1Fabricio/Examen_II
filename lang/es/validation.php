<?php

return [

    'required' => 'El campo :attribute es obligatorio.',
    'string' => 'El campo :attribute debe ser un texto.',
    'email' => 'El campo :attribute debe ser un correo electrónico válido.',
    'ends_with' => 'El campo :attribute debe terminar en: :values.',
    'unique' => 'El valor de :attribute ya está registrado.',
    'digits' => 'El campo :attribute debe tener exactamente :digits dígitos numéricos.',
    'in' => 'El valor seleccionado en :attribute no es válido.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'integer' => 'El campo :attribute debe ser un número entero.',
    'date' => 'El campo :attribute debe ser una fecha válida.',
    'regex' => 'El formato del campo :attribute no es válido.',
    'image' => 'El campo :attribute debe ser una imagen.',
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'uploaded' => 'No se pudo subir el archivo de :attribute.',

    'max' => [
        'array' => 'El campo :attribute no debe tener más de :max elementos.',
        'file' => 'El archivo de :attribute no debe pesar más de :max kilobytes.',
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'string' => 'El campo :attribute no debe tener más de :max caracteres.',
    ],

    'min' => [
        'array' => 'El campo :attribute debe tener al menos :min elementos.',
        'file' => 'El archivo de :attribute debe pesar al menos :min kilobytes.',
        'numeric' => 'El campo :attribute debe ser mayor o igual que :min.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],

    'gt' => [
        'array' => 'El campo :attribute debe tener más de :value elementos.',
        'file' => 'El archivo de :attribute debe pesar más de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'string' => 'El campo :attribute debe tener más de :value caracteres.',
    ],

    'custom' => [
        'telefono' => [
            'regex' => 'El teléfono debe tener 8 dígitos e iniciar con 2, 3, 8 o 9.',
        ],
    ],

    'attributes' => [
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'codigo' => 'código (SKU)',
        'nombre' => 'nombre',
        'categoria' => 'categoría',
        'precio' => 'precio',
        'costo' => 'costo',
        'inventario' => 'inventario',
        'imagen' => 'imagen',
        'fabricante' => 'fabricante',
        'fecha_vencimiento' => 'fecha de vencimiento',
        'fecha_registro' => 'fecha de registro',
        'numero_lote' => 'número de lote',
        'rtn' => 'RTN',
        'empresa' => 'empresa',
        'contacto' => 'contacto',
        'telefono' => 'teléfono',
        'limite_credito' => 'límite de crédito',
        'dias_credito' => 'días de crédito',
        'estado' => 'estado',
        'identidad' => 'identidad (DNI)',
        'apellido' => 'apellido',
        'correo' => 'correo',
        'cargo' => 'cargo',
        'salario' => 'salario',
        'fecha_ingreso' => 'fecha de ingreso',
    ],

];
