@extends('layouts.app')

@php
$title = strtoupper(
    __(
        'messages.common_crud.created.title',
        ['name' => __('messages.projects.project')]
    )
)
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-project-diagram',
    'title' => $title,
    'breadcrumb' => 'projects.create'
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
              'route' => 'projects.store',
              'method'=>'POST',
              'files' => true
          )
        )
    !!}
        @include('projects.partials.form')
    {!! Form::close() !!}
  @endcomponent
@endsection
