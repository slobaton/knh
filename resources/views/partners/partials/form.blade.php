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
            'partner_email',
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
        <strong>(*){{ __('messages.common.phone') }} :</strong>
        {!!
          Form::number(
            'partner_phone',
            null,
            array(
              'placeholder' => __('messages.common.phone'),
              'class' => 'form-control',
              'required' => 'required'
            )
          )
        !!}
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
                    'class' => 'custom-select',
                    'required' => 'required'
                  ]
                )
            !!}
      </div>
    </div>
</div>
{{-- @include('partners.partials.contact') --}}
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary float-right">
        <i class="fas fa-share-square"></i> {{ __('Enviar') }}
    </button>
</div>
