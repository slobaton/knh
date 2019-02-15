@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('scripts')
<script>
let data = "{{ json_encode($columns) }}";
let order = "{{ json_encode($order) }}";
let route = "{{ isset($param) ? route($route, $param) : route($route) }}";
$(function() {
  $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: route,
    columns: JSON.parse(data.replace(/&quot;/g,'"')),
    order: JSON.parse(order.replace(/&quot;/g,'"')),
    language: {
      url: "{!! asset('js/datatables/spanish.json') !!}",
    },
    initComplete: function(settings, json) {
      $('[data-toggle="tooltip"]').tooltip();
      $('.btn-danger').click(function() {
        event.preventDefault();

        swal("{!! $modalTitle !!}", {
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
    }
  });
});
</script>
<script>

        </script>
@endsection

@push('javascript')
<script
  type="text/javascript"
  src="{{ asset('js/datatables/jquery.dataTables.min.js')}}"
></script>
<script
  type="text/javascript"
  src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"
></script>
<script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>

@endpush
