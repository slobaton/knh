@extends('layouts.app')

@php
    $title = strtoupper(__('editar rol'))
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-id-card-alt',
    'title' => $title,
    'breadcrumb' => 'roles.edit'
])
@endcomponent

@section('content')
  @component('components.success_message')@endcomponent
  @component('components.form', [
      'title' => 'Formulario de edición de roles',
      'col' => '10',
      'info' => 'Los campos (*) son requeridos',
  ])
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
    @php
        $errorName = $errors->first('name') ? 'is-invalid' : '';
    @endphp
    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Nombre del rol:</strong>
          {!! Form::text('name', null, array('placeholder' => 'Name','class' => "form-control {$errorName}")) !!}
          <div class="invalid-feedback">
            {{ $errors->first('name') }}
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Permisos:</strong>
          <br/>
          <div class="row">
          @foreach($permission as $value)
          <div class="col-xs-12 col-md-3">
            <label>
                {{
                    Form::checkbox(
                        'permission[]',
                        $value->id,
                        in_array($value->id, $rolePermissions) ? true : false,
                        array('class' => 'name')
                    )
                }}
                {{ __('messages.permissions.'.$value->name) }}
            </label>
          </div>
          @endforeach
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary float-right">
          <i class="fas fa-share-square"></i> {{ __('Enviar') }}
        </button>
      </div>
    </div>
    {!! Form::close() !!}
  @endcomponent
@endsection
