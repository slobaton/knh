@extends('layouts.error')

@section('content')
  <div class="card text-center">
    <div class="card-header">
      {{ $title }}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $error }}</h5>
      <p class="card-text">
        {{ $message }}
      </p>
      <a href="{{ url()->previous() }}" class="btn btn-primary">
        {{ __('Volver atrás') }}
      </a>
    </div>
    <div class="card-footer text-muted">
      {{ $error }}
    </div>
  </div>
@stop
