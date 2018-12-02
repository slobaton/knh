<fieldset>
    <legend>{{ __('Datos del contacto') }} :</legend>
    <div class="form-row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
            <strong>{{ __('Nombre del contacto: ') }}</strong>
            {!!
                Form::text(
                    'name',
                    null,
                    array(
                      'placeholder' => __('Nombre del contacto'),
                      'class' => 'form-control',
                      'required' => 'required'
                    )
                )
            !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
            <strong>{{ __('Cargo que ocupa: ') }}</strong>
            {!!
                Form::text(
                    'position',
                    null,
                    array(
                      'placeholder' => __('cargo'),
                      'class' => 'form-control',
                      'required' => 'required'
                    )
                )
            !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
            <strong>{{ __('messages.common.city') }} :</strong>
            {!!
                Form::select(
                    'city',
                    Config::get('constants.bolivia_cities'),
                    null,
                    [
                        'placeholder' => '-- Escoja una ciudad --',
                        'class' => 'custom-select'
                    ]
                )
            !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <strong>{{ __('Fotografía: ') }} :</strong>
            <div class="custom-file form-group">
                <input type="file" class="custom-file-input" id="partnerImage">
                <label class="custom-file-label" for="partnerImage">
                    {{ __('Subir fotografía') }}
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
            <strong>{{ __('Telefono celular:') }}</strong>
            {!!
                Form::text(
                    'cellphone',
                    null,
                    array(
                      'placeholder' => __('Nombre del contacto'),
                      'class' => 'form-control',
                      'required' => 'required'
                    )
                )
            !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
            <strong>{{ __('Telefono fijo: ') }}</strong>
            {!!
                Form::text(
                    'phone',
                    null,
                    array('placeholder' => __('Nombre del contacto'),'class' => 'form-control')
                )
            !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>{{ __('Direccion: ') }} </strong>
            {!!
                Form::text(
                    'location',
                    null,
                    [
                        'placeholder' => 'Direccion',
                        'class' => 'form-control'
                    ]
                )
            !!}
            </div>
        </div>
    </div>
</fieldset>
