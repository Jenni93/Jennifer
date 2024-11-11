<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Resource;

class Tasacion extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Tasacion>
     */
    public static $model = \App\Models\Tasacion::class;

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
     * Cambia el título en el menú lateral.
     */
    public static function label()
    {
        return 'Tasaciones';
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
            
            Text::make('Nombre del Cliente', 'nombre_cliente')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Contacto del Cliente', 'contacto_cliente')
                ->rules('required', 'email')
                ->creationRules('unique:tasaciones,contacto_cliente')
                ->updateRules('email'),

            Text::make('Dirección', 'direccion')
                ->sortable()
                ->rules('required', 'max:255'),

            Number::make('Precio', 'precio')
                ->sortable()
                ->step(0.01),

            Textarea::make('Comentarios', 'comentarios')
                ->hideFromIndex(),

            Select::make('Estado', 'estado')
                ->options([
                    'Solicitado' => 'Solicitado',
                    'En proceso' => 'En proceso',
                    'Tasación completada' => 'Tasación completada',
                    'Rechazado' => 'Rechazado',
                ])
                ->displayUsingLabels()
                ->onlyOnForms()
                ->default(function ($request) {
                    return $request->isCreateOrAttachRequest() ? 'Solicitado' : null;
                })
                ->readonly(function ($request) {
                    return $request->isCreateOrAttachRequest(); 
                }),

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
