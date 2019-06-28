@can('document-delete')
{!!
  Form::open([
    'method' => 'DELETE',
    'route' => ['documents.destroy', $document->id],
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
        'title' => 'Eliminar proyecto'
      ]
    )
  !!}
{!! Form::close()!!}
@endcan
