@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('partners.create') }}
@endsection

@section('content')
  <h5 class="text-center">
    {{ strtoupper(__('messages.common_crud.created.title', ['name' => __('messages.partners.singular')])) }}
  </h5>
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

    {!! Form::open(array('route' => 'partners.store','method'=>'POST')) !!}
        @include('partners.partials.form')
    {!! Form::close() !!}
  @endcomponent
@endsection
