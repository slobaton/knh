@php
    $errorName = $errors->first('name') ? 'is-invalid' : '';
    $errorEmail = $errors->first('email') ? 'is-invalid' : '';
    $errorPassword = $errors->first('password') ? 'is-invalid' : '';
    $errorConfirmPassword = $errors->first('password_confirmation') ? 'is-invalid' : '';
    $errorRoles = $errors->first('roles') ? 'is-invalid' : '';
@endphp
<div class="col-xs-12 col-sm-12 col-md-12">
  <div class="form-group">
    <strong>(*)Nombre:</strong>
    {!!
        Form::text(
            'name',
            null,
            array(
                'placeholder' => 'Nombre',
                'class' => "form-control {$errorName}"
            )
        )
    !!}
    <div class="invalid-feedback">
      {{ $errors->first('name') }}
    </div>
  </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
  <div class="form-group">
    <strong>(*)Correo electrónico:</strong>
    {!!
        Form::text(
            'email',
            null,
            array(
                'placeholder' => 'Correo electrónico',
                'class' => "form-control {$errorEmail}"
            )
        )
    !!}
    <div class="invalid-feedback">
        {{ $errors->first('email') }}
    </div>
  </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6">
  <div class="form-group">
    <strong>(*)Contraseña:</strong>
    {!!
        Form::password(
            'password',
            array(
                'placeholder' => 'Contraseña',
                'class' => "form-control {$errorPassword}"
            )
        )
    !!}
    <div class="invalid-feedback">
      {{ $errors->first('password') }}
    </div>
  </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6">
  <div class="form-group">
    <strong>(*)Confirmar contraseña:</strong>
    {!!
        Form::password(
            'password_confirmation',
            array(
                'placeholder' => 'Confirmar contraseña',
                'class' => 'form-control'
            )
        )
    !!}
    <div class="invalid-feedback">
      {{ $errors->first('password_confirmation') }}
    </div>
  </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <strong>Roles de usuario:</strong>
    <div class="row">
      @foreach($roles as $value)
        <div class="col-md-3 {$errorRoles}">
          <label>
              {!!
                  Form::checkbox(
                      'roles[]',
                      $value->id,
                      null,
                      array('class' => "form-control {$errorRoles}")
                  )
              !!}
              {{ $value->name }}
          </label>
        </div>
        @endforeach
        <div class="col-md-10 invalid-feedback">
            {{ $errors->first('roles') }}
        </div>
    </div>
</div>
