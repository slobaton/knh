@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href={{ asset('css/callout.css') }}>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-project-diagram',
    'title' => 'DESCRIPCIÓN DEL PROYECTO',
    'breadcrumb' => 'projects.show'
])
@endcomponent

@section('content')
    <div class="row">
        <div class="bd-callout bd-callout-info col-sm-12 col-md-5">
            <h5 class="text-center">
                <strong>{{ __('Información del proyecto') }}</strong>
            </h5>
            <hr>
            <p>
                <strong>{{ __('Codigo: ') }}</strong>
                <em>{{ $project->project_code }}</em>
            </p>
            <p>
                <strong>{{ __('Nombre: ') }}</strong>
                <em>{{ $project->project_name }}</em>
            </p>
            <p>
                <strong>{{ __('Fecha de inicio: ') }}</strong>
                <em>
                    {{ Carbon\Carbon::parse($project->created_date)->format('d/m/Y') }}
                </em>
            </p>
                <strong>{{ __('Fecha de conclusión: ') }}</strong>
                <em>
                    {{ Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}
                </em>
            <p>

            </p>
            <p>
                <strong>{{ __('Socio: ') }}</strong>
                <a href="{{ route('partners.show', $partner->id) }}">
                    <em>{{ $partner->partner_name }}</em>
                </a>
            </p>
            <p>
                <strong>{{ __('Descripción del proyecto: ') }}</strong>
                <em>{{ $project->description }}</em>
            </p>
        </div>
        <div class="bd-callout bd-callout-warning col-sm-12 col-md-5 offset-md-2">
            <h5 class="text-center">
                <strong>{{ __('Información del coordinador') }}</strong>
            </h5>
            <hr>
            <p>
                <strong>{{ __('Nombre: ') }}</strong>
                <em>{{ $project->coordinator_name }}</em>
            </p>
            <p>
                <strong>{{ __('Teléfono Celular: ') }}</strong>
                <em>{{ $project->coordinator_cellphone }}</em>
            </p>
            <p>
                <strong>{{ __('Teléfono fijo: ') }}</strong>
                <em>{{ $project->coordinator_phone }}</em>
            </p>
            <p>
                <strong>{{ __('Correo eléctronico: ') }}</strong>
                <em>{{ $project->coordinator_email }}</em>
            </p>
            <p>
                <strong>{{ __('Descripción: ') }}</strong>
                <em>{{ $project->description }}</em>
            </p>
        </div>
        <div class="bd-callout bd-callout-info col-sm-12 col-md-12">
            <h5 class="text-center">
                <strong>{{ __('Documentos del proyecto') }}</strong>
            </h5>
            <hr>
            @if (count($documents) !== 0)
            <div class="clearfix">
                <a
                    role="button"
                    class="btn btn-secondary float-right"
                    href={{ route('documents.show', $project->id) }}
                >
                    {{ __('Ver tabla')}}
                </a>
            </div>
            @endif
            @if (count($documents) !== 0)
                @php
                    $types = config('constants.documents_types');
                    // unset($types['observations']);
                    $documentTypes = array_keys($types);
                @endphp
                <div class="row">
                    @foreach ($documentTypes as $type)
                        @if (! is_null($documents->get($type)))
                            <div class="col-sm-3 col-md-3">
                                <strong>
                                    {{ __(config('constants.documents_types.' . $type)) }}
                                </strong>
                                @foreach ($documents[$type] as $document)
                                <div class="col-sm-12 col-md-12">
                                    {{ $document->name }}
                                    <br>
                                    @foreach (json_decode($document->files) as $file)
                                        <a href="{{ Storage::url($file) }}" target="_blank">
                                            <i class="fas fa-file-pdf"></i>
                                            {{ last(explode('/', $file))}}
                                        </a>
                                        <br>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <br>
                        @endif
                    @endforeach
                </div>
            @else
            <p class="text-center">{{ _('No existen documentos') }}</p>
            @endif
        </div>
    </div>
@endsection
