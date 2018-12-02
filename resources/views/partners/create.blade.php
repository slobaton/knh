@extends('layouts.app')

@php
$title = strtoupper(
    __(
        'messages.common_crud.created.title',
        ['name' => __('messages.partners.singular')]
    )
)
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'far fa-handshake',
    'title' => $title,
    'breadcrumb' => 'partners.create'
])
@endcomponent

@section('content')
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

    {!! 
        Form::open(
          array(
              'route' => 'partners.store',
              'method'=>'POST',
              'files' => true
          )
        )
    !!}
        @include('partners.partials.form')
    {!! Form::close() !!}
  @endcomponent
@endsection
