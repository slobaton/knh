@extends('layouts.app')

@php
    $title = strtoupper(__('editar socio'))
@endphp

@component('partials.custombreadcrumbs', [
    'icon' => 'far fa-handshake',
    'title' => $title,
    'breadcrumb' => 'partners.edit'
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
    {{-- {{ dd($partner) }} --}}
    {!!
        Form::model(
            $partner,
            [
                'method' => 'PATCH',
                'route' => ['partners.update', $partner->id],
                'files' => true
            ]
        )
    !!}
        @include('partners.partials.form')
    {!! Form::close() !!}
  @endcomponent
@endsection
