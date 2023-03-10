@extends('layouts.templateInt')
@section('content')
<section id="first_section" class="">
    <div class="container text-end">
        <h1>Tipo de producto</h1>
        <button class="btn_normal mt-3" data-bs-toggle="modal" data-bs-target="#register_modal">Agregar</button>
    </div>
    <div class="alert-success">
        <div class="alert alert_warning alert-warning text-center" id="alert_success_wrappers" role="alert">
            Operación realizada con éxito!!!
          </div>
    </div>
</section>
<section>
    <div class="container contenedor mt-5">
        <div class="col-12 py-4 text-center"><h2>TIPO DE PRODUCTOS</h2></div>
        <table id="myTable" class="dataTable table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Estado</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_types as $product_types)
                <tr>
                    <td>
                        {{$product_types->name}}
                    </td>
                    <td>
                        @if ($product_types->status===1)
                            Activo
                        @else
                            Desactivado
                        @endif
                    </td>
                    <td class="text-center">
                        <i class="bi bi-pencil-square" id="icon_square"></i>
                        <i class="bi bi-trash3" id="icon_trash"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="register_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="register_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="register_modalLabel">Tipo de Productos</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_followups" action="{{route('product_type_register.store')}}"  method="POST">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                {{-- <input type="hidden" id="id_lead" name="id_lead" value=""> --}}
                                <label for="tipo_producto" class="label_style">Agrega el tipo de producto:</label>
                                <input type="text" class="form-control input_style" name="tipo_producto" id="tipo_producto_id" placeholder="Snacks">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_normal_secondary_small" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn_small">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal --}}
{{-- alerts visualizacion --}}
@if (Session::has('success'))
<script>
     alert_success_wrappers.style.visibility = "visible";
    setTimeout(function() {
         alert_success_wrappers.style.visibility = "hidden";
    }, 5000);
</script>
@else
 @endif
{{-- alerts visualizacion --}}
@endsection
