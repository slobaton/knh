@extends('layouts.app')

@php
    $title = mb_strtoupper(__('messages.roles.show'))
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-id-card-alt',
    'title' => $title,
    'breadcrumb' => 'roles.show'
])
@endcomponent

@section('content')
  @component('components.form', ['title' => __('messages.users.description'), 'col' => '10'])
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nombre del rol:</strong>
        {{ $role->name }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Permisos:</strong>
        @if(!empty($rolePermissions))
        <ul>
          @foreach($rolePermissions as $value)
            <li>
                <label class="badge badge-pill badge-primary">
                  {{ __('messages.permissions.'.$value->name) }}
                </label>
            </li>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>
  @endcomponent
@endsection
