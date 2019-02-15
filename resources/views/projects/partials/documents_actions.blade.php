@can('document-show')
<a
  role="button"
  class="btn btn-secondary btn-sm text-white"
  href="{{ Storage::url($document->file) }}"
  data-toggle="tooltip"
  data-placement="bottom"
  title="{{ __('Abrir documento') }}"
  target="_blank"
>
    <i class="fas fa-file-pdf"></i>
</a>
@endcan

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
