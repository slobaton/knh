@extends('layouts.app')
@php
    $title = strtoupper(__('messages.common_crud.created.title', ['name' => __('messages.roles.role')]))
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-id-card-alt',
    'title' => $title,
    'breadcrumb' => 'roles.create'
])
@endcomponent

@section('content')
  @component('components.form', [
    'title' => 'Formulario de creación de roles',
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
        $errorPermissions = $errors->first('permission') ? 'is-invalid' : '';
    @endphp
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('(*)Nombre del rol') }}</strong>
                {!! Form::text('name', null, array('placeholder' => 'Nombre del rol','class' => "form-control {$errorName}")) !!}
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('(*)Permisos: ') }}</strong>
                <br/>
                <div class="row">
                    @foreach($permission as $value)
                    <div class="col-xs-12 col-md-3">
                        <label class="is-invalid">
                            {{
                                Form::checkbox(
                                    'permission[]',
                                    $value->id,
                                    false,
                                    array('class' => 'name is-invalid')
                                )
                            }}
                            {{
                                __('messages.permissions.'.$value->name)
                            }}
                        </label>
                    </div>
                    @endforeach
                    <div class="invalid-feedback col-xs-12 col-md-12">
                        {{ $errors->first('permission') }}
                    </div>
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
