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
    <h5 class="text-center">
        <strong>{{ __('Documentos del proyecto') }}</strong>
    </h5>
    <hr>
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Fecha Creacion</th>
            <th>Descripción</th>
            <th>Documentos</th>
            <th>Acciones</th>
            </tr>
        </thead>
    </table>
    @php
        $modalTile = __(
            'messages.common_crud.confirm_message',
            ['name' => __('documento')]
        );
    @endphp
    @component('components.datatable', [
        'modalTitle' => $modalTile,
        'route' => 'projects.documents',
        'param' => $id,
        'order' => [[2, 'desc']],
        'columns' => [
            [
                'data' => 'name',
                'name' => 'name',
            ], [
                'data' => 'type',
                'name' => 'type',
            ], [
                'data' => 'created_at',
                'name' => 'created_at',
            ], [
                'data' => 'description',
                'name' => 'description',
            ], [
                'data' => 'files',
                'name' => 'files',
                'orderable' => false,
                'searchable' => false
            ], [
                'data' => 'action',
                'name' => 'action',
                'orderable' => false,
                'searchable' => false
            ]
        ]
    ])
    @endcomponent
@endsection

@push('javascript')
<script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>
@endpush
