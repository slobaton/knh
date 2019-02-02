<a
  role="button"
  class="btn btn-primary btn-sm"
  href="{{ route('roles.edit',$role->id) }}"
  data-toggle="tooltip"
  data-placement="bottom"
  title="{{ __('Editar rol') }}"
>
  <i class="fas fa-edit"></i>
</a>

<a
  role="button"
  class="btn btn-secondary btn-sm text-white"
  href="{{ route('roles.show',$role->id) }}"
  data-toggle="tooltip"
  data-placement="bottom"
  title="{{ __('Ver rol') }}"
>
  <i class="fas fa-eye"></i>
</a>

{!!
  Form::open([
    'method' => 'DELETE',
    'route' => ['roles.destroy', $role->id],
    'style'=>'display:inline',
    'class' => 'delete-action'
  ])
!!}
  {!!
    Form::button(
      '<i class="fas fa-trash-alt"></i>',
      [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm text-white',
        'data-toggle' => 'tooltip',
        'data-placement' => 'bottom',
        'title' => 'Eliminar rol'
      ]
    )
  !!}
{!! Form::close()!!}
