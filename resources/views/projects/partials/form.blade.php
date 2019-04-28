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
                'class' => 'form-control',
                'required' => 'required'
              )
            )
          !!}
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
                        'class' => 'form-control',
                        'required' => 'required',
                        'id' => 'createdAt'
                    )
                );
            !!}
            <small id="createdAt" class="form-text text-muted">
                dd-mm-yyyy
            </small>
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
                        'class' => 'form-control',
                        'required' => 'required',
                        'id' => 'endAt'
                    )
                );
            !!}
            <small id="endAt" class="form-text text-muted">
                dd-mm-yyyy
            </small>
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
                'class' => 'form-control',
                'required' => 'required',
                'min' => 1,
                'max' => 999999
              )
            )
          !!}
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
                    'class' => 'custom-select',
                    'required' => 'required'
                  ]
                )
            !!}
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
                'class' => 'form-control',
                'required' => 'required'
              )
            )
          !!}
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
                'class' => 'form-control',
                'required' => 'required'
              )
            )
          !!}
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
                    'class' => 'custom-select',
                    'required' => 'required'
                  ]
                )
            !!}
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
                'class' => 'form-control',
                'required' => 'required',
                'min' => 1,
                'max' => 99999999
              )
            )
          !!}
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
                'class' => 'form-control',
                'required' => 'required',
                'min' => 1,
                'max' => 99999999
              )
            )
          !!}
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
