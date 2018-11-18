@extends('layouts.app')


@section('content')
<h5 class="text-center">{{ mb_strtoupper(__('messages.roles.show')) }}</h5>
<hr>

  @component('components.form', ['title' => __('messages.users.description'), 'col' => '10'])
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Name:</strong>
        {{ $role->name }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Permissions:</strong>
        @if(!empty($rolePermissions))
        <ul>
          @foreach($rolePermissions as $v)
            <li>
              <label class="badge badge-pill badge-primary">{{ $v->name }}</label>
            </li>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>
  @endcomponent
@endsection
