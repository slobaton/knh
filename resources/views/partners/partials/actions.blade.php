@can('partner-edit')
<a
  role="button"
  class="btn btn-primary btn-sm"
  href="{{ route('partners.edit',$partner->id) }}"
  data-toggle="tooltip"
  data-placement="bottom"
  title="{{ __('Editar socio') }}"
>
  <i class="fas fa-edit"></i>{{ __('Editar') }}
</a>
@endcan
@can('partner-show')
<a
  role="button"
  class="btn btn-secondary btn-sm text-white"
  href="{{ route('partners.show',$partner->id) }}"
  data-toggle="tooltip"
  data-placement="bottom"
  title="{{ __('Ver socio') }}"
>
  <i class="fas fa-eye"></i>{{ __('Ver') }}
</a>
@endcan
@can('partner-delete')
{!!
  Form::open([
    'method' => 'DELETE',
    'route' => ['partners.destroy', $partner->id],
    'style'=>'display:inline',
    'class' => 'delete-action'
  ])
!!}
  {!!
    Form::button(
      '<i class="fas fa-trash-alt"></i>Eliminar',
      [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm text-white',
        'data-toggle' => 'tooltip',
        'data-placement' => 'bottom',
        'title' => 'Eliminar socio'
      ]
    )
  !!}
{!! Form::close()!!}
@endcan
