@can('project-edit')
<a
  role="button"
  class="btn btn-primary btn-sm"
  href="{{ route('projects.edit',$project->id) }}"
  data-toggle="tooltip"
  data-placement="bottom"
  title="{{ __('Editar proyecto') }}"
>
  <i class="fas fa-edit"></i>
</a>
@endcan
@can('project-show')
<a
  role="button"
  class="btn btn-secondary btn-sm text-white"
  href="{{ route('projects.show', $project->id) }}"
  data-toggle="tooltip"
  data-placement="bottom"
  title="{{ __('Ver proyecto') }}"
>
  <i class="fas fa-eye"></i>
</a>
@endcan
@can('upload-files')
<a
    role="button"
    class="btn btn-info btn-sm text-white"
    data-toggle="tooltip"
    data-placement="bottom"
    title="{{ __('Subir archivo al servidor') }}"
    href="{{ route('projects.upload', $project->id) }}"
>
    <i class="fas fa-file-upload"></i>
</a>
@endcan
@can('project-delete')
{!!
  Form::open([
    'method' => 'DELETE',
    'route' => ['projects.destroy', $project->id],
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
