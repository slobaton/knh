@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('partners.index') }}
@endsection

@section('content')
<h5 class="text-center">{{ strtoupper(__('messages.partners.plural')) }}</h5>
<hr>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="float-right">
          <a
            class="btn btn-primary"
            href="{{ route('partners.create') }}"
          >
          <i class="fa fa-plus" aria-hidden="true"></i>
            {{ __('messages.common.create', ['name' => __('messages.partners.singular')]) }}
          </a>
      </div>
    </div>
  </div>
</div>
<br>
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>{{ __('Nombre del socio') }}</th>
      <th>{{ __('Correo') }}</th>
      <th width="280px">{{ __('Acciones') }}</th>
    </tr>
  </thead>
</table>

@php
  $modalTile = __(
    'messages.common_crud.confirm_message',
    ['name' => __('messages.partners.singular')]
  );
@endphp

@component('components.datatable', [
  'modalTitle' => $modalTile,
  'route' => 'partners.data',
  'order' => [[0, 'desc']],
  'columns' => [
    [
      'data' => 'partner_name',
      'name' => 'partner_name',
    ], [
      'data' => 'partner_email',
      'name' => 'partner_email',
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
