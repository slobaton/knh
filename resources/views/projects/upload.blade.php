@extends('layouts.app')

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-project-diagram',
    'title' => 'DOCUMENTOS DEL PROYECTO',
    'breadcrumb' => 'projects.show'
])
@endcomponent

@section('content')

@component('components.success_message')@endcomponent

@component('components.form', ['title' => 'Subir al archivo al servidor', 'col' => '10'])
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Oops!</strong> {{ __('messages.common_crud.error.general') }}<br><br>
        <ul>
           @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
           @endforeach
        </ul>
      </div>
    @endif
    {!!
        Form::open(
            array(
                'route' => ['projects.upload.file', $project->id],
                'method'=>'POST',
                'files' => true
            )
        )
    !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>(*){{ __('Nombre del archivo:') }}</strong>
                    {!!
                        Form::text(
                            'name',
                            null,
                            array(
                                'placeholder' => 'Nombre del archivo',
                                'class' => 'form-control',
                                'required' => 'required'
                            )
                        )
                    !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>(*){{ __('Año: ') }}</strong>
                    {!!
                        Form::select(
                            'year',
                            get_years(),
                            null,
                            [
                                'placeholder' => '-- Escoja un año --',
                                'class' => 'custom-select',
                                'required' => 'required'
                            ]
                        )
                    !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>(*){{ __('Tipo de documento: ') }}</strong>
                    {!!
                        Form::select(
                            'type',
                            Config::get('constants.documents_types'),
                            null,
                            [
                                'placeholder' => '-- Escoja un tipo de documento --',
                                'class' => 'custom-select',
                                'required' => 'required'
                            ]
                        )
                    !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <strong>(*){{ __('Archivo: ') }}</strong>
                <div class="form-group">
                    <input
                        type="file"
                        id="file"
                        name="files[]"
                        lang="es"
                        multiple
                        required
                        accept=".docx,.doc,.pdf"
                    >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Descripción') }} :</strong>
                    {!!
                    Form::textarea(
                        'description',
                        null,
                        array(
                        'placeholder' => __('Ingrese una breve descripción de la observación'),
                        'class' => 'form-control',
                        'rows' => 3
                        )
                    )
                    !!}
                    <small id="endAt" class="form-text text-muted">
                        {{ __('* Las observaciones son usadas para documentación enviada por correo') }}
                    </small>
                </div>
            </div>
            {{ Form::hidden('project_id', $project->id) }}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-right">
                    <i class="fas fa-share-square"></i> {{ __('Enviar') }}
                </button>
            </div>
        </div>
    {!! Form::close() !!}
@endcomponent
@endsection
