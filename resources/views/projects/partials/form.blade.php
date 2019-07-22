@php
    $projectName = $errors->first('project_name') ? 'is-invalid' : '';
    $createdDate = $errors->first('created_date') ? 'is-invalid' : '';
    $endDate = $errors->first('end_date') ? 'is-invalid' : '';
    $projectCode = $errors->first('project_code') ? 'is-invalid' : '';
    $partner = $errors->first('partner_id') ? 'is-invalid' : '';
    $coordinatorName = $errors->first('coordinator_name') ? 'is-invalid' : '';
    $coordinatorEmail = $errors->first('coordinator_email') ? 'is-invalid' : '';
    $coordinatorCellphone = $errors->first('coordinator_cellphone') ? 'is-invalid' : '';
    $city = $errors->first('city') ? 'is-invalid' : '';

    $coordinatorPhone = $errors->first('coordinator_phone') ? 'is-invalid' : '';
@endphp
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>(*){{ __('Nombre del proyecto') }} :</strong>
          {!!
            Form::text(
              'project_name',
              null,
              array(
                'placeholder' => __('Nombre del proyecto'),
                'class' => "form-control {$projectName}",
              )
            )
          !!}
          <div class="invalid-feedback">
            {{ $errors->first('project_name') }}
          </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>
                (*){{ __('Fecha de inicio') }} :
            </strong>
            {!!
                Form::text(
                    'created_date',
                    null,
                    array(
                        'class' => "form-control {$createdDate}",
                        'id' => 'createdAt'
                    )
                );
            !!}
            <small id="createdAt" class="form-text text-muted">
                dd-mm-yyyy
            </small>
            <div class="invalid-feedback">
                {{ $errors->first('created_date') }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>
                (*){{ __('Fecha de conclusión') }} :
            </strong>
            {!!
                Form::text(
                    'end_date',
                    null,
                    array(
                        'class' => "form-control {$endDate}",
                        'id' => 'endAt'
                    )
                );
            !!}
            <small id="endAt" class="form-text text-muted">
                dd-mm-yyyy
            </small>
            <div class="invalid-feedback">
                {{ $errors->first('end_date') }}
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
          <strong>(*){{ __('Código del proyecto') }} :</strong>
          {!!
            Form::number(
              'project_code',
              null,
              array(
                'placeholder' => __('Código del proyecto'),
                'class' => "form-control {$projectCode}",
                'min' => 1,
                'max' => 999999
              )
            )
          !!}
        </div>
        <div class="invalid-feedback">
            {{ $errors->first('project_code') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>(*){{ __('messages.partners.plural') }} :</strong>
            {!!
                Form::select(
                  'partner_id',
                  $partners,
                  null,
                  [
                    'placeholder' => '-- Escoja un socio --',
                    'class' => "custom-select {$partner}",
                  ]
                )
            !!}
            <div class="invalid-feedback">
                {{ $errors->first('partner_id') }}
            </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>{{ __('Descripción del proyecto') }} :</strong>
          {!!
            Form::textarea(
              'description',
              null,
              array(
                'placeholder' => __('Descripción del proyecto'),
                'class' => 'form-control',
                'rows' => 3
              )
            )
          !!}
        </div>
    </div>

    {{-- coordinator --}}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>(*){{ __('Nombre del coordinador') }} :</strong>
          {!!
            Form::text(
              'coordinator_name',
              null,
              array(
                'placeholder' => __('Nombre del coordinador'),
                'class' => "form-control {$coordinatorName}",
              )
            )
          !!}
          <div class="invalid-feedback">
            {{ $errors->first('coordinator_name') }}
          </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
          <strong>(*){{ __('messages.login.email') }} :</strong>
          {!!
            Form::email(
              'coordinator_email',
              null,
              array(
                'placeholder' => __('messages.login.email'),
                'class' => "form-control {$coordinatorEmail}",
              )
            )
          !!}
          <div class="invalid-feedback">
            {{ $errors->first('coordinator_email') }}
          </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>(*){{ __('messages.common.city') }} :</strong>
            {!!
                Form::select(
                  'city',
                  Config::get('constants.bolivia_cities'),
                  null,
                  [
                    'placeholder' => '-- Escoja una ciudad --',
                    'class' => "custom-select {$city}",
                  ]
                )
            !!}
            <div class="invalid-feedback">
                {{ $errors->first('city') }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
          <strong>(*){{ __('Número de celular(coordinador)') }} :</strong>
          {!!
            Form::number(
              'coordinator_cellphone',
              null,
              array(
                'placeholder' => __('Número de celular'),
                'class' => "form-control {$coordinatorCellphone}",
                'min' => 1,
                'max' => 99999999
              )
            )
          !!}
          <div class="invalid-feedback">
            {{ $errors->first('coordinator_cellphone') }}
          </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>{{ __('Número de teléfono fijo(coordinador)') }} :</strong>
            {!!
                Form::number(
                'coordinator_phone',
                null,
                array(
                    'placeholder' => __('Número de télefono'),
                    'class' => "form-control {$coordinatorPhone}",
                    'min' => 1,
                    'max' => 99999999
                )
                )
            !!}
            <div class="invalid-feedback">
                {{ $errors->first('coordinator_phone') }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>{{ __('Información adicional del coordinador') }} :</strong>
          {!!
            Form::textarea(
              'additional_coordinator_info',
              null,
              array(
                'placeholder' => __('Información adicional del coordinador'),
                'class' => 'form-control',
                'rows' => 3
              )
            )
          !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary float-right">
            <i class="fas fa-share-square"></i> {{ __('Enviar') }}
        </button>
    </div>
</div>
