@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('partners.edit') }}
@endsection


@section('content')
    <h5 class="text-center">{{ strtoupper(__('editar socio')) }}</h5>
    <hr>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
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
            $partner,
            ['method' => 'PATCH', 'route' => ['partners.update', $partner->partner_id]]
        )
    !!}
        @include('partners.partials.form')
    {!! Form::close() !!}
  @endcomponent
@endsection
