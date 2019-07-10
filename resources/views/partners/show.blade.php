@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href={{ asset('css/callout.css') }}>
@endsection

@component('partials.custombreadcrumbs', [
    'icon' => 'far fa-handshake',
    'title' => 'DESCRIPCIÓN DEL SOCIO',
    'breadcrumb' => 'partners.show',
    'param' => $partner->id
])
@endcomponent

@section('content')

<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        @can('contact-create')
        <div class="col-lg-12">
            <div class="float-right">
                <a
                class="btn btn-primary"
                href="{{ url('partners/'.$partner->id.'/contacts/create') }}"
                >
                <i class="fa fa-plus" aria-hidden="true"></i>
                {{ __('Agregar contacto') }}
                </a>
            </div>
        </div>
        @endcan
        <div
            class="bd-callout bd-callout-info col-sm-12 col-md-12"
            style="background: white;"
        >
        <!-- Card -->
            <h5 class="text-center">
                <strong>
                    {{
                        __('Información del socio: ') . $partner->partner_name
                    }}
                </strong>
            </h5>
            <hr>
            <p>
                <strong class="font-weight-bold">
                    {{ __('messages.login.email') . ': ' }}
                </strong>
                {{ $partner->partner_email }}<br>
            </p>
            <p>
                <strong class="font-weight-bold">
                    {{ __('Número de teléfono') . ': ' }}
                </strong>
                {{ $partner->partner_phone }}<br>
            </p>
            <p>
                <strong class="font-weight-bold">
                    {{ __('Dirección') . ': ' }}
                </strong>
                {{ $partner->partner_location }}<br>
            </p>
            <p>
                <strong class="font-weight-bold">
                    {{ __('Ciudad') . ': ' }}
                </strong>
                {{ Config::get('constants.bolivia_cities.'.$partner->partner_city) }}<br>
            </p>
            <p>
                <strong class="font-weight-bold">
                    {{ __('Última actualización:') }}
                </strong>
                {{
                    date('d/m/Y h:m:s', strtotime($partner->updated_at))
                }}
            </p>
        </div>
    </div>
</div>
@php
    $moreThanOne = count($partner->contacts) > 1;
    $offset = $moreThanOne ? 0 : 3;
@endphp

@if (count($partner->contacts) > 0)
    <div class="row mb-5">
        <div class="col-md-12">
            <h5>
                <strong>{{ __('Contactos') }}</strong>
            </h5>
        </div>
    </div>
    <div class="row">
        @include('contacts.show', [
            'contacts' => $partner->contacts,
            'offset' => $offset
        ])
    </div>
@endif
@endsection
