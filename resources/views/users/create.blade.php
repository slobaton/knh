@extends('layouts.app')

@php
    $title = strtoupper(__('messages.common_crud.created.title', ['name' => __('messages.users.user')]));
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-user-plus',
    'title' => $title,
    'breadcrumb' => 'users.create'
])
@endcomponent

@section('content')
  @component('components.form', [
    'title' => 'Formulario de creación de usuarios',
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

    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <div class="row">
      @include('users.partials.form')
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary float-right">
          <i class="fas fa-share-square"></i> {{ __('Crear usuario') }}
        </button>
      </div>
    </div>
    {!! Form::close() !!}
  @endcomponent
@endsection
