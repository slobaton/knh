@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href={{ asset('css/home.css') }}>
@endsection

@php
    $title = __('messages.common.home');
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-home',
    'title' => $title,
    'breadcrumb' => 'home'
])
@endcomponent

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3 mb-4">
    <!-- Card -->
      <div class="card testimonial-card">
        <!-- Bacground color -->
        <div class="card-up indigo lighten-1 color-general">
        </div>
        <!-- Avatar -->
        <div class="avatar mx-auto white">
          <img src={{ asset('img/utilidades/user.png') }} class="rounded-circle">
        </div>
        <div class="card-body">
          <h4 class="card-title text-center">
            {{ Auth::user()->name }}
          </h4>
          <hr>
          <p>
            <strong class="font-weight-bold">
              {{ __('messages.login.email') . ': ' }}
            </strong>
            {{ Auth::user()->email }}<br>
          </p>
          <p>
            <strong class="font-weight-bold">
              {{ __('messages.common.created_at') . ': ' }}
            </strong>
            {{ date('d/m/Y h:m:s', strtotime(Auth::user()->created_at)) }}<br>
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
