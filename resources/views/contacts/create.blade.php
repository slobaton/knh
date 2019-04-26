@extends('layouts.app')

@php
$title = strtoupper(
    __(
        'messages.common_crud.created.title',
        ['name' => __('messages.contacts.singular')]
    )
)
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'far fa-handshake',
    'title' => $title,
    'breadcrumb' => 'contacts.create',
    'param' => request()->route('partner')
])
@endcomponent

@section('content')
    @component('components.form', [
        'title' => 'Formulario de creación de contactos',
        'info' => 'Los campos (*) son requeridos',
        'col' => 10
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
        {!!
            Form::open(
                array(
                    'route' => 'contacts.store',
                    'method' => 'POST',
                    'files' => true
                )
            )
        !!}
            @include('contacts.partials.form')
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-right">
                  <i class="fas fa-share-square"></i> {{ __('Guardar') }}
                </button>
            </div>
        {!! Form::close() !!}
    @endcomponent
@endsection
