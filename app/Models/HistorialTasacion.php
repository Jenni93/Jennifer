<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialTasacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tasacion_id',
        'estado',
        'cambiado_por',
        'fecha_cambio',
    ];


    protected static function booted()
    {
        static::creating(function ($historial) {
            $historial->fecha_cambio = now(); // Guardar la fecha actual
        });
    }

    public function tasacion()
    {
        return $this->belongsTo(Tasacion::class);
    }
}
