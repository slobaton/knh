<a
  role="button"
  class="btn btn-primary btn-sm"
  href="{{ route('users.edit',$user->id) }}"
>
  <i class="fas fa-user-edit"></i>
</a>

<a
  role="button"
  class="btn btn-secondary btn-sm text-white"
  href="{{ route('users.show',$user->id) }}"
>
  <i class="fas fa-eye"></i>
</a>

{!!
  Form::open([
    'method' => 'DELETE',
    'route' => ['users.destroy', $user->id],
    'style'=>'display:inline',
    'class' => 'delete-action'
  ])
!!}
  {!!
    Form::button(
      '<i class="fas fa-user-times"></i>',
      [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm text-white',
      ]
    )
  !!}
{!! Form::close()!!}
