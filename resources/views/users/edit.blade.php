@extends('layouts.app')

@php
    $title = strtoupper(__('editar usuario'));
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-user-edit',
    'title' => $title,
    'breadcrumb' => 'users.edit'
])
@endcomponent

@php
    $title = $user->name;
@endphp

@section('content')
  @component('components.success_message', [
      'message' => 'La información del usuario ha sido actualizada'
  ])
  @endcomponent
  @component('components.form', [
      'title' => "Usuario: {$title}",
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

  {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
    <div class="row">
      @include('users.partials.form')
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary float-right">
          <i class="fas fa-share-square"></i> {{ __('Actualizar usuario') }}
        </button>
      </div>
    </div>
  {!! Form::close() !!}
  @endcomponent
@endsection
