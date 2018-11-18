@extends('layouts.app')

@section('content')
<h5 class="text-center">{{ strtoupper(__('messages.users.users')) }}</h5>
<hr>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="float-right">
      <a
        class="btn btn-primary"
        href="{{ route('users.create') }}"
      >
        <i class="fas fa-user-plus"></i>
        {{ __('messages.common.create', ['name' => __('messages.users.user')]) }}
      </a>
    </div>
  </div>
</div>
<br>
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
  <thead>
  <tr>
    <th>ID</th>
    <th>{{ __('messages.users.name') }}</th>
    <th>{{ __('messages.login.email') }}</th>
    <th>{{ __('messages.common.created_at') }}</th>
    <th>{{ __('messages.common.accions') }}</th>
  </tr>
  </thead>
</table>
@php
  $modalTile = __(
      'messages.common_crud.confirm_message',
      ['name' => __('messages.users.user')]
  );
@endphp
@component('components.datatable', [
  'modalTitle' => $modalTile,
  'route' => 'users.data',
  'order' => [[0, 'desc']],
  'columns' => [
  [
    'data' => 'id',
    'name' => 'id',
  ], [
    'data' => 'name',
    'name' => 'name',
  ], [
    'data' => 'email',
    'name' => 'email',
  ], [
    'data' => 'created_at',
    'name' => 'created_at',
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
