@extends('layouts.app')

@php
$title = strtoupper(
    __(
        'messages.common_crud.edit',
        ['name' => __('messages.contacts.singular')]
    )
)
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'far fa-handshake',
    'title' => $title,
    'breadcrumb' => 'contacts.edit',
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
            Form::model(
                $contact,
                array(
                    'route' => ['contacts.update', $contact->id],
                    'method' => 'POST',
                    'files' => true
                )
            )
        !!}
            @include('contacts.partials.form')
            {{ Form::hidden('contact_id', $contact->id) }}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-right">
                    <i class="fas fa-share-square"></i> {{ __('Guardar') }}
                </button>
            </div>
        {!! Form::close() !!}
    @endcomponent
@endsection
