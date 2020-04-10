@extends('layouts.app')
@section('content')
<form id="form-item-lista" class="form-item-lista" method="GET" action="{{ route($ctrl['route'].'.lista') }}">
  {{ method_field('GET') }}
  {{ csrf_field() }}
</form>
<div class="content-body" id="div-lista">
</div>
<form id="form-item-create" class="hidden" method="GET">
  {{ csrf_field() }}
</form>
<form id="form-item-delete" class="hidden" method="POST">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}
</form>
@endsection
@push('scripts')
<script>
  $(document).ready(function() {
    $(".form-item-lista").submit();
  });
</script>
@endpush
