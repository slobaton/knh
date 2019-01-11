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
<div class="container">
    <div class="bd-callout bd-callout-warning">
    <h5>
        <strong>{{ __('Informacion del proyecto') }}</strong>
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
    </div>
</div>
@endsection
