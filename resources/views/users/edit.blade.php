@extends('layouts.app')

@section('content')
  <h5 class="text-center">{{ strtoupper(__('editar usuario')) }}</h5>
  <hr>

  @component('components.form', ['title' => 'Formulario', 'col' => '10'])
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
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Role:</strong>
          {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control','multiple')) !!}
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
