@php
    $partnerName = $errors->first('partner_name') ? 'is-invalid' : '';
    $partnerEmail = $errors->first('partner_email') ? 'is-invalid' : '';
    $partnerPhone = $errors->first('partner_phone') ? 'is-invalid' : '';
    $partnerCity = $errors->first('partner_city') ? 'is-invalid' : '';
@endphp
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>(*){{ __('messages.users.name') }} :</strong>
        {!!
          Form::text(
            'partner_name',
            null,
            array(
              'placeholder' => __('messages.users.name'),
              'class' => "form-control {$partnerName}",
            )
          )
        !!}
        <div class="invalid-feedback">
            {{ $errors->first('partner_name') }}
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <strong>(*){{ __('messages.login.email') }} :</strong>
        {!!
          Form::email(
            'partner_email',
            null,
            array(
              'placeholder' => __('messages.login.email'),
              'class' => "form-control {$partnerEmail}",
            )
          )
        !!}
        <div class="invalid-feedback">
            {{ $errors->first('partner_email') }}
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <strong>(*){{ __('messages.common.phone') }} :</strong>
        {!!
          Form::number(
            'partner_phone',
            null,
            array(
              'placeholder' => __('messages.common.phone'),
              'class' => "form-control {$partnerPhone}",
            )
          )
        !!}
        <div class="invalid-feedback">
            {{ $errors->first('partner_phone') }}
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>{{ __('messages.common.location') }} :</strong>
        {!!
          Form::text(
            'partner_location',
            null,
            array(
              'placeholder' => __('messages.common.location'),
              'class' => 'form-control'
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
                  'partner_city',
                  Config::get('constants.bolivia_cities'),
                  null,
                  [
                    'placeholder' => '-- Escoja una ciudad --',
                    'class' => "custom-select {$partnerCity}",
                  ]
                )
            !!}
            <div class="invalid-feedback">
                {{ $errors->first('partner_city') }}
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary float-right">
        <i class="fas fa-share-square"></i> {{ __('Enviar') }}
    </button>
</div>
