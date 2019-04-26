@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href={{ asset('css/callout.css') }}>
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
            @php
                $document_types = array_keys(config('constants.documents_types'));
            @endphp
            <div class="row">
                @foreach ($document_types as $type)
                    @if (! is_null($documents->get($type)))
                        <div class="col-sm-3 col-md-3">
                            <strong>
                                {{ __(config('constants.documents_types.' . $type)) }}
                            </strong>
                            @foreach ($documents[$type] as $document)
                            <div class="col-sm-12 col-md-12">
                                <a href="{{ Storage::url($document->file) }}">
                                    {{ $document->name }}
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <br>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
