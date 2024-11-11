<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\HistorialTasacion;
use App\Notifications\EstadoTasacionActualizado;
use Illuminate\Support\Facades\Notification;

class Tasacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_cliente',
        'contacto_cliente',
        'direccion',
        'precio',
        'comentarios',
        'estado',
    ];

    public function historial()
    {
        return $this->hasMany(HistorialTasacion::class);
    }

    // Evento para crear el historial al crear una tasación
    protected static function booted()
    {
        // Evento al crear la tasación
        static::created(function ($tasacion) {
            HistorialTasacion::create([
                'tasacion_id' => $tasacion->id,
                'estado' => 'Solicitado',
                'cambiado_por' => Auth::user() ? Auth::user()->name : 'Sistema', // Usuario logueado o 'Sistema'
            ]);
        });

        // Evento al actualizar la tasación
        static::updated(function ($tasacion) {
            if ($tasacion->isDirty('estado')) {
                HistorialTasacion::create([
                    'tasacion_id' => $tasacion->id,
                    'estado' => $tasacion->estado,
                    'cambiado_por' => Auth::user() ? Auth::user()->name : 'Sistema', // Usuario logueado o 'Sistema'
                ]);
            }
            if ($tasacion->isDirty('estado') && $tasacion->contacto_cliente) {
                // Envía la notificación al correo en `contacto_cliente`
                Notification::route('mail', $tasacion->contacto_cliente)
                    ->notify(new EstadoTasacionActualizado($tasacion, $tasacion->estado, $tasacion->contacto_cliente));
            }
        });
    }
}
