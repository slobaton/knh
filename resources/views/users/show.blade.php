@extends('layouts.app')

@php
    $title = strtoupper(__('messages.users.show'));
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-user',
    'title' => $title,
    'breadcrumb' => 'users.show'
])
@endcomponent

@section('content')
  @component('components.form', ['title' => __('messages.users.description'), 'col' => '10'])
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>{{ __('messages.users.name').': ' }}</strong>
        {{ $user->name }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>{{ __('messages.login.email').': ' }}</strong>
        {{ $user->email }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('messages.users.roles').': ' }}</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-secondary">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
  </div>
  @endcomponent
@endsection
