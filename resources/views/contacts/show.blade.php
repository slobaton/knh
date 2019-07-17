@foreach ($contacts as $contact)
<div class="col-md-6 offset-md-{{ $offset }}">
    <!-- Card -->
    <div class="card testimonial-card">
        <!-- Avatar -->
        <div class="avatar mx-auto white">
            <img
            src={{ $contact->photo ? Storage::url($contact->photo) : asset('img/utilidades/user.png') }}
            class="rounded-circle"
            >
        </div>
        <div class="card-body">
            <h4 class="card-title text-center">
                {{ $contact->name }}
            </h4>
            <hr>

            <strong class="font-weight-bold">
                {{ __('Cargo') . ': ' }}
            </strong>
            {{ $contact->position }}<br>
            <strong class="font-weight-bold">
                {{ __('Número de teléfono') . ': ' }}
            </strong>
            {{ $contact->phone }}<br>
            <strong class="font-weight-bold">
                {{ __('Número de celular') . ': ' }}
            </strong>
            {{ $contact->cellphone }}<br>
            <strong class="font-weight-bold">
                {{ __('Dirección') . ': ' }}
            </strong>
            {{ $contact->location }}<br>
        </div>
        <div class="card-body text-right">
            @can('contact-delete', Contact::class)
                {!!
                    Form::open([
                        'method' => 'DELETE',
                        'route' => ['contacts.destroy', $contact->id],
                        'style'=>'display:inline',
                        'class' => 'delete-action',
                    ])
                !!}
                {!!
                    Form::button(
                        '<i class="fas fa-trash-alt"></i> Eliminar',
                        [
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm text-white',
                            'data-toggle' => 'tooltip',
                            'data-placement' => 'bottom',
                            'title' => 'Eliminar socio',
                            'contact-name' => $contact->name
                        ]
                    )
                !!}
                {!! Form::close()!!}

            @endcan
            @can('contact-update', Contact::class)
                <a
                href="{{ url('partners/'.$partner->id.'/contacts/edit', $contact->id) }}"
                    class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> {{ __('Editar') }}
                </a>
            @endcan
        </div>
    </div>
</div>
@endforeach

@push('javascript')
<script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@section('scripts')
    <script>
        $('.btn-danger').click(function(event) {
            let self = this;
            event.preventDefault();
            swal("Eliminar a: " + self.getAttribute('contact-name'), {
                dangerMode: true,
                icon: "warning",
                buttons: {
                    cancel: '{!! __("messages.common_crud.cancel") !!}',
                    ok: {
                    text: '{!! __("messages.common_crud.delete") !!}',
                    value: 'ok',
                    }
                },
            }).then((value) => {
                switch (value) {
                    case "ok":
                        $(this).closest("form.delete-action").submit();
                    break;
                }
            });
        });
    </script>
@endsection
