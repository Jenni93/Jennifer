<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Datetime;
use Laravel\Nova\Resource;


class HistorialTasacion extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\HistorialTasacion>
     */
    public static $model = \App\Models\HistorialTasacion::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

     /**
     * Deshabilitar la creación de registros en HistorialTasacion.
     */
    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    /**
     * Deshabilitar la edición de registros en HistorialTasacion.
     */
    public function authorizedToUpdate(Request $request)
    {
        return false;
    }

    /**
     * Deshabilitar la eliminación de registros en HistorialTasacion.
     */
    public function authorizedToDelete(Request $request)
    {
        return false;
    }
    
    /**
     * Deshabilitar la opción de replicación para el recurso HistorialTasacion.
     */
    public function authorizedToReplicate(Request $request)
    {
        return false;
    }

    /**
     * Cambia el título en el menú lateral.
     */
    public static function label()
    {
        return 'Historial de las tasaciones';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Tasacion', 'tasacion')
                ->display(function ($tasacion) {
                    return $tasacion->nombre_cliente; // Muestra el nombre del cliente
                })
                ->searchable(),

            Select::make('Estado', 'estado')
                ->options([
                    'Solicitado' => 'Solicitado',
                    'En proceso' => 'En proceso',
                    'Tasación completada' => 'Tasación completada',
                    'Rechazado' => 'Rechazado',
                ])
                ->displayUsingLabels()
                ->sortable(),

            Text::make('Cambiado Por', 'cambiado_por')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Fecha de Cambio', 'fecha_cambio')
                ->sortable()


        ];
    }
    public static function searchableColumns()
    {
        return [
            'id',
            'tasacion.nombre_cliente',
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    
    
}
