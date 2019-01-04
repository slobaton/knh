@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href={{ asset('css/home.css') }}>
@endsection

@component('partials.custombreadcrumbs', [
    'icon' => 'far fa-handshake',
    'title' => 'DESCRIPCIÓN DEL SOCIO',
    'breadcrumb' => 'partners.show'
])
@endcomponent

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mb-4">
    <!-- Card -->
      <div class="card testimonial-card">
        <!-- Bacground color -->
        <div class="card-up primary lighten-1 color-general">
          <h5 class="mt-4 ml-4">{{ __('Datos de la institución') }}</h5>
        </div>
        <!-- Avatar -->
        <div class="avatar mx-auto white">
          <img
            src={{
                $partner->partner_photo ? Storage::url($partner->partner_photo) : asset('img/utilidades/user.png')
            }}
            class="rounded-circle"
          >
        </div>
        <div class="card-body">
          <h4 class="card-title text-center">
            {{ $partner->partner_name }}
          </h4>
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
          <p><strong class="font-weight-bold">Última actualización:</strong>
          {{ date('d/m/Y h:m:s', strtotime(Auth::user()->updated_at)) }}</p>
        </div>
      </div>
    <!-- Card -->
    </div>

        <div class="col-md-6 mb-4">
    <!-- Card -->
      <div class="card testimonial-card">
        <!-- Bacground color -->
        <div class="card-up indigo lighten-1 color-general">
          <h5 class="mt-4 ml-4">{{ __('Datos del contacto') }}</h5>
        </div>
        <!-- Avatar -->
        <div class="avatar mx-auto white">
          <img
            src={{ $partner->photo ? Storage::url($partner->photo) : asset('img/utilidades/user.png') }}
            class="rounded-circle"
          >
        </div>
        <div class="card-body">
          <h4 class="card-title text-center">
            {{ $partner->name }}
          </h4>
          <hr>
          <p>
            <strong class="font-weight-bold">
              {{ __('Cargo') . ': ' }}
            </strong>
            {{ $partner->position }}<br>
          </p>
          <p>
            <strong class="font-weight-bold">
              {{ __('Número de teléfono') . ': ' }}
            </strong>
            {{ $partner->phone }}<br>
          </p>
          <p>
            <strong class="font-weight-bold">
              {{ __('Número de celular') . ': ' }}
            </strong>
            {{ $partner->cellphone }}<br>
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
          <p><strong class="font-weight-bold">Última actualización:</strong>
          {{ date('d/m/Y h:m:s', strtotime(Auth::user()->updated_at)) }}</p>
        </div>
      </div>
    <!-- Card -->
    </div>
  </div>
</div>
@endsection
