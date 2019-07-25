@extends('layouts.app')

@php
    $title = strtoupper(__('messages.roles.roles'))
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-id-card-alt',
    'title' => $title,
    'breadcrumb' => 'roles.index'
])
@endcomponent

@section('content')
@component('components.success_message')@endcomponent
<div class="row">
  <div class="col-lg-12 margin-tb">
    @can('role-create')
        <div class="float-right">
            <a
                class="btn btn-primary"
                href="{{ route('roles.create') }}"
            >
                <i class="fa fa-plus" aria-hidden="true"></i>
                {{ __('messages.common.create', ['name' => __('messages.roles.role')]) }}
            </a>
        </div>
    @endcan
  </div>
</div>
<br>
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
     <th>ID</th>
     <th>Nombre del rol</th>
     <th width="280px">Acciones</th>
    </tr>
  </thead>
</table>

@php
  $modalTile = __(
      'messages.common_crud.confirm_message',
      ['name' => __('messages.roles.role')]
  );
@endphp
@component('components.datatable', [
  'modalTitle' => $modalTile,
  'route' => 'roles.data',
  'order' => [[0, 'desc']],
  'columns' => [
    [
      'data' => 'id',
      'name' => 'id',
    ], [
      'data' => 'name',
      'name' => 'name',
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
