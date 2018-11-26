@can('partner-edit')
<a
  role="button"
  class="btn btn-primary btn-sm"
  href="{{ route('partners.edit',$partner->id) }}"
>
  <i class="fas fa-edit"></i>
</a>
@endcan
@can('partner-show')
<a
  role="button"
  class="btn btn-secondary btn-sm text-white"
  href="{{ route('partners.show',$partner->id) }}"
>
  <i class="fas fa-eye"></i>
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
      '<i class="fas fa-trash-alt"></i>',
      [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm text-white',
      ]
    )
  !!}
{!! Form::close()!!}
@endcan
