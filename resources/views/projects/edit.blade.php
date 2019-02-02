@extends('layouts.app')
@section('css')
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css"rel="stylesheet" type="text/css" />
@endsection
@php
    $title = strtoupper(__('editar proyecto'))
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'far fa-handshake',
    'title' => $title,
    'breadcrumb' => 'projects.edit'
])
@endcomponent

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
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
        Form::model(
            $project,
            [
                'method' => 'PATCH',
                'route' => ['projects.update', $project->id],
                'files' => true
            ]
        )
    !!}
        @include('projects.partials.form')
    {!! Form::close() !!}
  @endcomponent
@endsection

@section('scripts')
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy'
        });
    </script>
@endsection
