@php
    $name = $errors->first('name') ? 'is-invalid' : '';
    $position = $errors->first('position') ? 'is-invalid' : '';
    $city = $errors->first('city') ? 'is-invalid' : '';
    $photo = $errors->first('photo') ? 'is-invalid' : '';
    $cellphone = $errors->first('cellphone') ? 'is-invalid' : '';
    $phone = $errors->first('phone') ? 'is-invalid' : '';
    $location = $errors->first('location') ? 'is-invalid' : '';
@endphp
<fieldset>
    <legend>{{ __('Datos del contacto') }} :</legend>
    <div class="form-row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>(*){{ __('Nombre del contacto: ') }}</strong>
                {!!
                    Form::text(
                        'name',
                        null,
                        array(
                        'placeholder' => __('Nombre del contacto'),
                        'class' => "form-control {$name}",
                        )
                    )
                !!}
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>(*){{ __('Cargo que ocupa: ') }}</strong>
                {!!
                    Form::text(
                        'position',
                        null,
                        array(
                        'placeholder' => __('cargo'),
                        'class' => "form-control {$position}"
                        )
                    )
                !!}
                <div class="invalid-feedback">
                    {{ $errors->first('position') }}
                </div>
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
                            'class' => "custom-select {$city}"
                        ]
                    )
                !!}
                <div class="invalid-feedback">
                    {{ $errors->first('city') }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <strong>{{ __('Fotografía: ') }} :</strong>
            <div class="form-group {{$photo}}">
                <input type="file" id="partnerImage" name="photo">
            </div>
            <div class="invalid-feedback">
                {{ $errors->first('photo') }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>(*){{ __('Teléfono celular:') }}</strong>
                {!!
                    Form::number(
                        'cellphone',
                        null,
                        array(
                        'placeholder' => __('Celular del contacto'),
                        'class' => "form-control {$cellphone}"
                        )
                    )
                !!}
                <div class="invalid-feedback">
                    {{ $errors->first('cellphone') }}
                </div>
            </div>
        </div>

        {{ Form::hidden('partner_id', request()->route('partner')) }}

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>{{ __('Telefono fijo: ') }}</strong>
                {!!
                    Form::number(
                        'phone',
                        null,
                        array(
                            'placeholder' => __('Teléfono del contacto'),
                            'class' => "form-control {$phone}"
                        )
                    )
                !!}
                <div class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Dirección: ') }} </strong>
                {!!
                    Form::text(
                        'location',
                        null,
                        [
                            'placeholder' => 'Direccion',
                            'class' => "form-control {$location}"
                        ]
                    )
                !!}
                <div class="invalid-feedback">
                    {{ $errors->first('location') }}
                </div>
            </div>
        </div>
    </div>
</fieldset>
